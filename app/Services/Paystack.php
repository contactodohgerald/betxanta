<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Exception;


class Paystack {

    public $SECRET_KEY = "sk_test_c8f03377dabe58540c2f1e81b2a2cf7664712660";
    public $PUBLIC_KEY = "pk_test_e9b1ab31bda909d03e5561fa362eb29db3df4364";

    public function initializePayment($data) {
        try{
            $response = Http::withHeaders([
                "Authorization" => "Bearer $this->SECRET_KEY",
                "Content-Type" => "application/json",
            ])->post('https://api.paystack.co/transaction/initialize', $data);

            return json_decode($response, true);
        }catch(Exception $e) {
            return false;
        }
    }

    public function verifyPayment($ref) {
        $response = Http::withHeaders([
            "Authorization" => "Bearer $this->SECRET_KEY",
            "Content-Type" => "application/json",
        ])->get('https://api.paystack.co/transaction/verify/'.$ref);

        return json_decode($response, true);
    }

    public function getBankList() {
        $response = Http::withHeaders([
            "Authorization" => "Bearer $this->SECRET_KEY",
            "Content-Type" => "application/json",
        ])->get('https://api.paystack.co/bank');

        return json_decode($response, true);
    }   
    
    public function verifyAccountDetail($acct_no, $bank_code) {

        $response = Http::withHeaders([
            "Authorization" => "Bearer $this->SECRET_KEY",
            "Content-Type" => "application/json",
        ])->get('https://api.paystack.co/bank/resolve', [
            "account_number" => $acct_no,
            "bank_code" => $bank_code
        ]);

        return json_decode($response, true);
    }

    function transferRecipient($data){
        $response = Http::withHeaders([
            "Authorization" => "Bearer $this->SECRET_KEY",
            "Content-Type" => "application/json",
        ])->post('https://api.paystack.co/transferrecipient', $data);

        return json_decode($response, true);
    }
    
    function initiateTransfer($data){
        $response = Http::withHeaders([
            "Authorization" => "Bearer $this->SECRET_KEY",
            "Content-Type" => "application/json",
        ])->post('https://api.paystack.co/transfer', $data);

        return json_decode($response, true);
    }
    
    function finalizeTransfer($data){
        $response = Http::withHeaders([
            "Authorization" => "Bearer $this->SECRET_KEY",
            "Content-Type" => "application/json",
        ])->post('https://api.paystack.co/transfer/finalize_transfer', $data);

        return json_decode($response, true);
    }



}