<?php

namespace App\Console\Commands;

use App\Models\BankList;
use App\Services\Paystack;
use Illuminate\Console\Command;

class UpdateBanksList extends Command
{
    function __construct(private Paystack $paystack, private BankList $bankList)
    {
        parent::__construct();
        $this->paystack = $paystack;
        $this->bankList = $bankList;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:banks-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get list of banks from paystack and create or update the banklist table';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $response = $this->paystack->getBankList();
        if($response['status']){
            $banks = $this->bankList->where('status', true)->get();
            if(count($banks) < 1){
                foreach($response['data'] as $bank){
                    $this->bankList->create([
                        'name' => $bank['name'],
                        'slug' => $bank['slug'],
                        'code' => $bank['code'],
                        'longcode' => $bank['longcode'],
                        'country' => $bank['country'],
                        'currency' => $bank['currency'],
                        'type' => $bank['type'],
                    ]);
                }
            }
        }
    }
}
