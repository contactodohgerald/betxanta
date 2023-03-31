<?php

namespace App\Http\Controllers\CurrencyRate;

use App\Http\Controllers\Controller;
use App\Models\CurrencyRate;
use Illuminate\Http\Request;
use App\Services\CurrencyRates;

class CurrencyRateController extends Controller
{
    //

    private $currencyRate;

    function __construct(CurrencyRate $currencyRate)
    {
        $this->currencyRate = $currencyRate;
    }

    public function getRates(CurrencyRates $currencyrate){

        $rates = $currencyrate->returnCurrencyRate();
        if($rates['success'] == true){
            $currency = $this->currencyRate->all();
            if(count($currency) == 0){
                foreach($rates['rates'] as $key => $rate){
                    CurrencyRate::create([
                        'symbol' => $key,
                        'base_cur' => $rates['base'],
                        'rates' => $rate, 
                        'expression' => '1 '.$rates['base'].' = '.$rate.' '.$key,
                    ]);
                }
            }else{
                foreach($rates['rates'] as $key => $rate){
                    CurrencyRate::where('symbol', $key)->update([
                        'base_cur' => $rates['base'],
                        'symbol' => $key,
                        'rates' => $rate, 
                        'expression' => '1 '.$rates['base'].' = '.$rate.' '.$key,
                    ]);
                }
            }
        }
        return $rates;
    }


}
