<?php

namespace App\Http\Controllers\Bet;

use App\Http\Controllers\Controller;
use App\Jobs\SendBetPlaceNotifier;
use App\Models\Bet;
use App\Models\Category;
use App\Models\Game;
use App\Models\User;
use App\Services\BetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Trait\CurrencyHandler;

class BetHandlerController extends Controller
{
    //
    use CurrencyHandler;

    function __construct(private Game $game, private User $user, private Bet $bet, private Category $category)
    {
        $this->game = $game;
        $this->user = $user;
        $this->bet = $bet;
    }

    public function placeBetHandler(Request $request, BetService $betService)
    {
        $request_data = $request->all();
        $validator = Validator::make($request_data, [
            "betOption"  => ['required', 'string'], 
            "amount"  => ['required', 'numeric'], 
            "categoriesId"  => ['required', 'string'], 
            "leaguesId"  => ['required', 'string'], 
            "gamesId"  => ['required', 'string'], 
            "userId"  => ['required', 'string']
        ]);
        if($validator->fails()) return response()->json(['message'=> "", "data"=> $validator->errors()], 422);

        $games = $this->game->where('id', $request_data['gamesId'])->first();
        $user = $this->user->where('id', $request_data['userId'])->first();
        $bets = $this->bet->where('game_id', $request_data['gamesId'])
            ->where('league_id', $request_data['leaguesId'])
            ->where('category_id', $request_data['categoriesId'])
            ->where('bet_status', 'ongoing')
            ->where('game_date', $request_data['game_date'])
            ->first();

        $returnOption = $betService->returnOption($request_data['betOption'], $games);    
     
        //rules
        //check if user wallet balance is sufficent
        if($request_data['amount'] >= $user->toView($user->wallet_bal)) return response()->json(['message'=> "Wallet balance is not sufficiant, Please deposit to continue ", "data"=> []], 400);

        //1. check if a bet is already opened, if not go ahead and create a new bet
        if($bets == null)
        {
            $betService->deductUserWallet($user, $request->amount);
            $bet = $betService->storeBetRecords($request_data, $user, $returnOption);
            //$betService->sendNotifier($user, $request_data, $returnOption);
            SendBetPlaceNotifier::dispatch($bet, $user, $request_data, $returnOption);
            return response()->json(['message'=> "Bet was created successfully", "data"=> $bet], 201);
        }

        //2. check if opened bet has this user on any of the betting option, if yes, updates the bet amount and send them a notification of bet update
        if($bets->first_team == $request_data['userId'] || $bets->draw == $request_data['userId'] || $bets->last_team == $request_data['userId'])
        {
            $betService->deductUserWallet($user, $request_data['amount']);
            $bet = $betService->updateBetRecords($request_data, $bets, $user, $returnOption);
            SendBetPlaceNotifier::dispatch($bet, $user, $request_data, $returnOption);
            return response()->json(['message'=> "Bet was updated successfully", "data"=> $bet], 200);
        }

        //3. check if the requested amount matches any of the opened bets, if yes, check if their betting option is vacant and update ithem as required.
        if($user->toView($bets->bet_amt) == $request_data['amount'] && $bets->first_team == null || $bets->draw == null || $bets->last_team == null)
        {
            $betService->deductUserWallet($user, $request_data['amount']);
            $bet = $betService->updateBetRecords($request_data, $bets, $user, $returnOption);
            SendBetPlaceNotifier::dispatch($bet, $user, $request_data, $returnOption);
            return response()->json(['message'=> "Bet was updated successfully", "data"=> $bet], 200);
        }

        //4.if not, open a new bet for the requested user
        $betService->deductUserWallet($user, $request_data['amount']);
        $bet = $betService->storeBetRecords($request_data, $user, $returnOption);
        SendBetPlaceNotifier::dispatch($bet, $user, $request_data, $returnOption);
        return response()->json(['message'=> "Bet was created successfully", "data"=> $bet], 201);
    }

    public function openBetsInterface($id = null)
    {
        $category = $this->category->where('id', $id)->first();
        $open_bets = $this->bet->where('bet_status', 'ongoing')
            ->where('category_id', $id)
            ->get();
        $view = [
            'country' => $this->getCountry(),
            'category' => $this->category->all(),
            '_user' => $this->user(),
            'open_bets' => $open_bets,
            'category_details' => $category,
        ];
        return view('main.open-bets', $view);
    }

   
}
