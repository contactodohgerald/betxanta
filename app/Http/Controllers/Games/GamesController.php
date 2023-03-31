<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use App\Models\Bet;
use App\Models\BetHistory;
use App\Models\Category;
use App\Models\CurrencyRate;
use App\Models\Game;
use App\Models\League;
use App\Models\Team;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Trait\CurrencyHandler;

class GamesController extends Controller
{
    //
    use CurrencyHandler;

    function __construct(
        private Category $category, private League $league, private Team $team, 
        private Game $game, private Bet $bet, private User $user, private CurrencyRate $currencyRate
    )
    {
        $this->category = $category;
        $this->league = $league;
        $this->team = $team;
        $this->game = $game;
        $this->user = $user;
        $this->currencyRate = $currencyRate;
    }

    public function gameInterface()
    {
        $categories = $this->category->all();
        foreach($categories as $cat){
            $leagues = $this->league->where('category_id', $cat->id)->get();
            $cat->leagues = $leagues;
        }

        $view = [
            '_user' => $this->user(),
            'country' => $this->getCountry(),
            'categories' => $categories,
            'currency' => $this->currencyRate->all(),
        ];
        return view('admin.games', $view);
    } 
    
    public function creatGameInterface($id = null)
    {

        $view = [
            '_user' => $this->user(),
            'teams' => $this->team->where('league_id' , $id)->get(),
            'league' =>$this->league->where('id', $id)->first(),
            'currency' => $this->currencyRate->all(),
            'country' => $this->getCountry(),
        ];
        return view('admin.create-games', $view);
    }

    public function creatNewGame(Request $request): RedirectResponse
    {
        $user = auth()->user();
        $request->validate([
            'game_date' => ['required', 'date'],
            'country' => ['required', 'string'],
            'team_a' => ['required', 'string'],
            'team_b' => ['required', 'string'],
            'min_amt' => ['required', 'numeric'],
            'escrow_fee' => ['required', 'numeric'],
        ]);

        if($request->team_a == $request->team_b){
            toast('Team pair can`t be the same ', 'error');
            return redirect()->back();
        }

        if($request->location_a == $request->location_b){
            toast('Team Loaction Status can`t be the same ', 'error');
            return redirect()->back();
        }

        $games = $this->game->where('league_id', $request->league)
            ->where('status', true)
            ->where('game_status', 'ongoing')
            ->where('team_a', $request->team_a)
            ->where('team_b', $request->team_b)
            ->where('location_a', $request->location_a)
            ->where('location_b', $request->location_b)
            ->first();   
                    
        if($games != null){
            toast('A game with this exact details has already been added, trying edting it to suite your current needs', 'error');
            return redirect()->back();
        }

        $game = Game::create([
            'league_id' => $request->league,
            'category_id' => $request->category,
            'country_id' => $request->country,
            'game_date' => $request->game_date,
            'team_a' => $request->team_a,
            'team_b' => $request->team_b,
            'location_a' => $request->location_a,
            'location_b' => $request->location_b,
            'game_status' => 'ongoing',
            'min_amt' => $this->processExchangeRate($request->min_amt, 'to_db', $user->id),
            'escrow_fee' => $request->escrow_fee,
        ]);

        //send notification to users
        //get users that subscribed to notifications
        $users = User::where('notify_status', true)->get();
        if(count($users) > 0){
            $data = [
                'name' => '',
                'subject' => $game->country->name.' '.$game->league->name.' TODAY!',
                'message' => $game->frst_team->name.' Vs '.$game->second_team->name.' was just added on '.env('APP_NAME').'. Log in to place your bets',
                'body' => 'This is an atomated notification. For enquiries on '.env('APP_NAME').' services. please send an email to '.env('APP_MAIL'),
                'thankyou' => 'Thank you for trusting in our services',
            ];
            Notification::send($users, new GeneralNotification($data, ['mail', 'database']));
        }

        toast('Game was created successfully', 'success');
        return redirect()->back();

    }

    public function viewGameInterface($status = null)
    {
        $games = $this->game->where('game_status', $status)->simplePaginate(10);
        $view = [
            'status' => $status,
            'country' => $this->getCountry(),
            'games' => $games,
            '_user' => $this->user(),
            'currency' => $this->currencyRate->all(),
        ];
        return view('admin.view-games', $view);
    }

    public function endOngoingGame(Request $request)
    {
        $request->validate([
            'winners' => ['required', 'string'],
            'score' => ['required', 'string'],
        ]);

        $game = $this->game->where('game_status', 'ongoing')
            ->where('id', $request->game_id)->first();
        if($game == null){
            toast('This Game is currently not ongoing ', 'error');
            return redirect()->back();
        }   
        
        $bets = $this->bet->where('bet_status', 'ongoing')
            ->where('game_id', $game->id)
            ->where('status', true)
            ->get();

        if(count($bets) == 0){
            toast('No Bet was recorded / placed for this game', 'error');
            return redirect()->back();
        }  
        
        foreach($bets as $bet){
            if($request->winners == 'first_team' && $bet->first_team != ''){
                //get the user who won
                $_user = $this->user->where('id', $bet->first_team)->first();
                $this->processWhoWon($game, $bet, $_user);
            }
            if($request->winners == 'last_team' && $bet->last_team != ''){
                //get the user who won
                $_user = $this->user->where('id', $bet->last_team)->first();
                $this->processWhoWon($game, $bet, $_user);
            }
            if($request->winners == 'draw' && $bet->draw != ''){
                //get the user who won
                $_user = $this->user->where('id', $bet->draw)->first();
                $this->processWhoWon($game, $bet, $_user);
            }
        }
        $game->update([
            'game_status' => 'completed',
            'who_won' => $request->winners,
            'payload' => $request->score,
        ]);
        toast('Game was ended successfully', 'success');
        return redirect()->back();
    }

    protected function processWhoWon($game, $bet, $_user)
    {
        //multiply the amount by the number of people that placed the bet : max-3
        $amount = $bet->bet_amt * $bet->bet_count;
        //calculate the platform percent fee
        $_amount = ($game->escrow_fee * $amount) / 100;
        //minus the escrow fee from the won amount and update the user's wallet
        $new_amt = $amount - $_amount;
        $_user->update([
            'wallet_bal' => $_user->wallet_bal + $new_amt,
        ]);
        //get the reffered user's account and update their ref's balance
        $ref_user = $this->user->where('referral', $_user->referred)->first(); 
        if($ref_user != null){
            $ref_amount = (env('REF_PERCENT') * $amount) / 100;
            //update their ref wallet
            $ref_user->update([
                'ref_bal' => $ref_user->ref_bal + $ref_amount,
            ]);
        }
        //update bet status
        $bet->update([
            'bet_status' => 'completed',
        ]);
        //create Bet history
        BetHistory::create([
            'bet_id' => $bet->id,
            'game_id' => $game->id,
            'user_id' => $_user->id,
            'amt_won' => $new_amt,
            'bet_status' => 'paid',
        ]);
        $datas = [
            'name' => $_user->name,
            'subject' => 'Congratulations 🥳🎉🏆💰 '. $_user->name,
            'message' => 'You just won '.$_user->toView($new_amt).' '.$_user->currency_rate->symbol.' on '.env('APP_NAME').', your wallet has been credited with the amount, you can place a withdrawal anytime',
            'body' => 'This is an atomated notification. For enquiries on '.env('APP_NAME').' services. please send an email to '.env('APP_MAIL'),
            'thankyou' => 'Thank you for trusting in our services',
        ];
        Notification::send($_user, new GeneralNotification($datas, ['mail', 'database']));
        return true;
    }
}
