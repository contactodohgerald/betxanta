<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bet;
use App\Models\Team;
use App\Models\Category;
use App\Models\CurrencyRate;
use App\Models\Game;
use App\Models\League;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawalRequest;
use App\Services\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    //    
    function __construct(
        private CurrencyRate $currencyRate, private Team $team, private Category $category,
        private League $league, private Bet $bet, private WithdrawalRequest $withdrawalRequest,
        private Game $game, private Transaction $transaction
    )
    {
        $this->currencyRate = $currencyRate;
        $this->team = $team;
        $this->category = $category;
        $this->bet = $bet;
        $this->withdrawalRequest = $withdrawalRequest;
        $this->transaction = $transaction;
    }

    public function adminMainPage()
    {
        return view('admin.index', [
            '_user' => $this->user(),
            'users' => User::where('type', 'user')->where('status', true)->get(),
            'games' => $this->game->where('status', true)->get(),
            'open_bets' => $this->bet->where('bet_status', 'ongoing')->where('status', true)->get(),
            'country' => $this->getCountry(),
            'currency' => $this->currencyRate->all(),
            'withdrawals' => $this->withdrawalRequest->where('trf_status', 'pending')->simplePaginate(5),
            'categories' => $this->category->get(),
            'leagues' => $this->league->get(),
            'teams' => $this->team->where('status', true)->get(),
            'deposit' => $this->transaction->where('type', 'wallet-deposit')->sum('amount'),
            'withdraw' => $this->transaction->where('type', 'wallet-withdraw')->sum('amount'),
            'withdraw_request' => $this->withdrawalRequest->sum('amount'),
        ]);
    } 
    
    public function viewCategoryPage()
    {    
        $view =  [
            '_user' => $this->user(),
            'country' => $this->getCountry(),
            'category' => $this->category->simplePaginate(8),
            'currency' => $this->currencyRate->all(),
        ];
        return view('admin.view_category', $view);
    } 
    
    public function leaguePage(): View
    {    
        $view =  [
            '_user' => $this->user(),
            'country' => $this->getCountry(),
            'category' => $this->category->all(),
            'subcategory' => $this->league->simplePaginate(10),
            'currency' => $this->currencyRate->all(),
        ];
        return view('admin.league', $view);
    } 

    public function storeNewLeague(Request $request, FileUpload $fileUpload): RedirectResponse
    {
        $request->validate([
            'subcat_name' => ['required', 'string'],
            'category' => ['required', 'string'],
            'country' => ['required', 'string'],
        ]);

        $path = null;

        if($request->file('subcat_logo')){
            $request->validate([
                'subcat_logo' => 'required|mimes:png,jpg,jpeg,|max:2048'
            ]);
            $path = $fileUpload->uploadFile($request->file('subcat_logo'), 'league');
        }

        League::create([
            'country_id' => $request->country,
            'category_id' => $request->category,
            'name' => $request->subcat_name,
            'status' => true,
            'subcat_logo' => $path,
        ]);

        toast('League was sucessfully created', 'success');
        return redirect()->back();
    }  

    public function updateLeague(Request $request, FileUpload $fileUpload, $id = null): RedirectResponse
    {
        $request->validate([
            'subcat_name' => ['required', 'string'],
            'category' => ['required', 'string'],
            'country' => ['required', 'string'],
        ]);

        $leagues = $this->league->where('id', $id)->first();

        if($request->file('subcat_logo')){
            $request->validate([
                'subcat_logo' => 'required|mimes:png,jpg,jpeg,|max:2048'
            ]);
            $path = $fileUpload->uploadFile($request->file('subcat_logo'), 'league');
            $leagues->update([
                'subcat_logo' => $path,
            ]);
        }

        $leagues->update([
            'country_id' => $request->country,
            'category_id' => $request->category,
            'name' => $request->subcat_name,
        ]);

        toast('League was sucessfully updated', 'success');
        return redirect()->back();
    }

    public function teamPage(){ 
        $view =  [
            '_user' => $this->user(),
            'country' => $this->getCountry(),
            'category' => $this->category->all(),
            'leagues' => $this->league->all(),
            'teams' => $this->team->where('status', true)->simplePaginate(8),
            'currency' => $this->currencyRate->all(),
        ];
        return view('admin.teams', $view);
    }   

    public function storeNewTeam(Request $request, FileUpload $fileUpload): RedirectResponse
    {
        $request->validate([
            'opponent_name' => ['required', 'string'],
            'category' => ['required', 'string'],
            'leagues' => ['required', 'string'],
        ]);

        $path = null;
        if($request->file('logo')){
            $request->validate([
                'logo' => 'required|mimes:png,jpg,jpeg,|max:2048'
            ]);
            $path = $fileUpload->uploadFile($request->file('logo'), 'team');
        }

        Team::create([
            'category_id' => $request->category,
            'league_id' => $request->leagues,
            'name' => $request->opponent_name,
            'symbol' => strtoupper($request->symbol),
            'status' => true,
            'logo' => $path,
        ]);

        toast('Team was sucessfully created', 'success');
        return redirect()->back();
    }

    public function updateTeam(Request $request, FileUpload $fileUpload, $id = null): RedirectResponse
    {
        $request->validate([
            'opponent_name' => ['required', 'string'],
            'category' => ['required', 'string'],
            'leagues' => ['required', 'string'],
        ]);

        $teams = $this->team->where('id', $id)->first();
        $path = null;

        if($request->file('logo')){
            $request->validate([
                'logo' => 'required|mimes:png,jpg,jpeg,|max:2048'
            ]);
            $path = $fileUpload->uploadFile($request->file('logo'), 'team');
            $teams->update([
                'logo' => $path,
            ]);
        }

        $teams->update([
            'category_id' => $request->category,
            'league_id' => $request->leagues,
            'name' => $request->opponent_name,
            'symbol' => $request->symbol,
        ]);

        toast('Team was sucessfully updated', 'success');
        return redirect()->back();
    }

    public function openBetInterface($option)
    {
        $view = [
            '_user' => $this->user(),
            'country' => $this->getCountry(),
            'currency' => $this->currencyRate->all(),
            'bets' => $this->bet->where('bet_status', $option)->where('status', true)->simplePaginate(10),
            'option' => $option,
        ];
        return view('admin.bets-history', $view);
    }

}
