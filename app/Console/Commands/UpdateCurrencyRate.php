<?php

namespace App\Console\Commands;

use App\Models\CurrencyRate;
use App\Services\CurrencyRates;
use Illuminate\Console\Command;

class UpdateCurrencyRate extends Command
{
    function __construct(private CurrencyRate $currencyRate, private CurrencyRates $currencyRates)
    {
        parent::__construct();
        $this->currencyRate = $currencyRate;
        $this->currencyRates = $currencyRates;
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:currency-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command updates the rate of currency weekly';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $rates = $this->currencyRates->returnCurrencyRate();
        if($rates['success'] == true){
            $currency = $this->currencyRate->all();
            if(count($currency) == 0){
                foreach($rates['rates'] as $key => $rate){
                    $this->currencyRate->create([
                        'symbol' => $key,
                        'base_cur' => $rates['base'],
                        'rates' => $rate, 
                        'expression' => '1 '.$rates['base'].' = '.$rate.' '.$key,
                    ]);
                }
            }else{
                foreach($rates['rates'] as $key => $rate){
                    $this->currencyRate->where('symbol', $key)->update([
                        'base_cur' => $rates['base'],
                        'symbol' => $key,
                        'rates' => $rate, 
                        'expression' => '1 '.$rates['base'].' = '.$rate.' '.$key,
                    ]);
                }
            }
        } 
    }
}
