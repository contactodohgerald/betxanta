<?php

namespace App\Services;

use App\Models\Bet;
use App\Trait\CurrencyHandler;

class BetService{

    use CurrencyHandler;

    public function storeBetRecords($data, $user, $returnOption)
    {
        $amount = $this->processExchangeRate($data['amount'], 'to_db', $data['userId']);
        $bets = Bet::create([
            'game_id' => $data['gamesId'],
            'league_id' => $data['leaguesId'],
            'category_id' => $data['categoriesId'],
            'bet_amt' => $amount['amount'],
            'first_team' => ($data['betOption'] == 'firstTeam') ? $data['userId'] : null,
            'draw' => $data['betOption'] == 'draw' ? $data['userId'] : null,
            'last_team' => ($data['betOption'] == 'lastTeam') ? $data['userId'] : null,
            'bet_status' => 'ongoing',
            'game_date' => $data['game_date'],
        ]);
        return $bets;
    }

    public function returnOption($betOption, $games)
    {
        if($betOption == 'firstTeam'){
            $clubName = $games->frst_team->name;
            $option = 'Win';
        }elseif($betOption == 'lastTeam'){
            $clubName = $games->second_team->name;
            $option = 'Win';
        }else{
            $clubName = $games->second_team->name.' Vs '.$games->second_team->name;
            $option = 'Draw';
        }
        return ['name'=> $clubName, 'option'=> $option];
    }

    public function updateBetRecords($data, $bets)
    {
        $bet = $bets->update([
            'first_team' => ($data['betOption'] == 'firstTeam') ? $data['userId'] : $bets->first_team,
            'draw' => $data['betOption'] == 'draw' ? $data['userId'] : $bets->draw,
            'last_team' => ($data['betOption'] == 'lastTeam') ? $data['userId'] : $bets->last_team,
            'game_date' => $data['game_date'],
            'bet_count' => ($bets->bet_count <= 2)?$bets->bet_count + 1 : $bets->bet_count,
        ]);

        return $bet;
    }

    public function deductUserWallet($user, $amt)
    {
        $amount = $this->processExchangeRate($amt, 'to_db', $user->id);
        $wallet_bal = $user->wallet_bal - $amount;
        $user->update([
            "wallet_bal" => $wallet_bal
        ]);
        return $user->wallet_bal;
    }
    
}