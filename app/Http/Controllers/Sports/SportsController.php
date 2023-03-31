<?php

namespace App\Http\Controllers\Sports;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\League;

class SportsController extends Controller
{
    //
    private $category;
    private $game;
    private $league;

    function __construct(Category $category, Game $game, League $league)
    {
        $this->category = $category;
        $this->game = $game;
        $this->league = $league;
    }

    public function landingPage(){
        $view = [
            'country' => $this->getCountry(),
            '_user' => $this->user(),
            'category' => Category::all(),
            'leagues' => $this->league->where('status', true)->get(),
            'games' => $this->game->where('game_status', 'ongoing')->simplePaginate(10),
        ];
        return view('main.index', $view);
    }

    public function allSportsPage($id = null)
    {
        $sub_cat = $this->league->where('category_id', $id)->get();
        $category = $this->category->where('id', $id)->first();
        $games =  $this->game->where('game_status', 'ongoing')->where('category_id', $id)->simplePaginate(4);  
        $view = [
            '_user' => $this->user(),
            'country' => $this->getCountry(),
            'category' => $this->category->all(),
            'leagues' => $sub_cat,
            'games' => $games,
            'category_details' => $category,
        ];
        return view('main.all-sports', $view);
    }

    public function sportsLeague($id = null)
    {
        $games = $this->game->where('game_status', 'ongoing')->where('league_id', $id)->simplePaginate(10);
        $view = [
            'country' => $this->getCountry(),
            'category' => $this->category->all(),
            '_user' => $this->user(),
            'games' => $games,
        ];
        return view('main.sport-league', $view);
    }

}
