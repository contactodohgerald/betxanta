<?php

namespace App\Trait;

use App\Models\CurrencyRate;
use App\Models\User;
use Illuminate\Support\Facades\Http;

trait CurrencyHandler
{

    public $api_key = "lLENLl8bPzGgSoGl7ACpS6aW4FyePhPW";

    public function returnCurrencyRate() {

        $response = Http::withHeaders([
            "apikey" => $this->api_key,
            "Content-Type" => "application/json",
        ])->get('https://api.apilayer.com/exchangerates_data/latest?symbols={symbols}&base={base}', [
            'symbols' => 'USD, NGN, EUR, GBP, AUD, CAD, BRL, CHF, CNY, GHS',
            'base' => 'EUR',
        ]);

        return json_decode($response, true);
    }

    public function processExchangeRate($amount_in = 0, $action = 'to_view', $user_id = null){
        $amount = null;
        //base currency is EUR
        //action = to_view || to_db

        if($user_id == null){
            //select the currency
            $currency = CurrencyRate::where('symbol', 'NGN')->first();
        }else{
            $user = User::where('id', $user_id)->first();
            //select the currency
            $currency = CurrencyRate::where('id', $user->preferred_cur)->first();
        }      
        $rate = $currency->rates;

        //check what action is coming in
        if($action === 'to_view'){
            //1EUR = $rate for choosen currency
            $amount = $amount_in * $rate;
        }else{
            $amount = $amount_in / $rate;
        }
        return $amount;
    }
    
}
