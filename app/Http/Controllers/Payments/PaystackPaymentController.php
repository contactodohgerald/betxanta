<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Trait\CurrencyHandler;
use App\Services\Paystack;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaystackPaymentController extends Controller
{
    //
    use CurrencyHandler;
    function __construct(private User $user)
    {
        $this->user = $user;
    }
    
    public function iniatePaystackPayment(Request $request, Paystack $paystack)
    {
        $request->validate([
            'payment_method' => ['required', 'string'],
            'amount' => ['required', 'string'],
        ]);
        $user =  $request->user();
        $uuid = (string) Str::uuid();

        if($request->payment_method == 'paystack'){
            $data = [
                'email' => $user->email,
                'amount' => $request->amount * 100,
                'reference' => $uuid,
            ];

            $response = $paystack->initializePayment($data);
            if($response['status']){
                $url = $response['data']['authorization_url'];
                return redirect()->to($url);
            }else{
                toast('There was an error, payment could not be completed', 'error');
                return redirect()->back();
            }
        }elseif($request->payment_method == 'perfect_money'){
            return null;
        }else{
            return null;
        }
    }

    public function verifyPaystackPayment(Request $request, Paystack $paystack)
    {
        //verify-payment
        $reference =  $request->query('reference');
        $response = $paystack->verifyPayment($reference);
        //check to see if the status are true | successful
        if($response['status']  != true && $response['data']['status'] != 'success'){
            toast('There was an error, payment could not be verify', 'error');
            return view('error', ['message'=> 'There was an error, payment could not be verify']);
        }
        $data = $response['data'];
        if($data['reference'] != $reference){
            toast('There was an error, payment could not be verify', 'error');
            return view('error', ['message'=> 'There was an error, payment could not be verify']);
        }
        //convert the amount back to naira from kobo
        $amount_ = $data['amount'] / 100;
        //get the user that made the transaction
        $user = $this->user->where('email', $data['customer']['email'])->first();
        //convert the amount to the  base currency to insert in to the database
        $amount = $this->processExchangeRate($amount_, 'to_db', $user->id);
        //create a new row of transaction
        Transaction::create([
            'user_id' => $user->id,
            'reference' => $data['reference'],
            'type' => 'wallet-deposit',
            'amount' => $amount,
            'status' => $response['status'],
            'mode' => 'Paystack with '.$data['channel'],
            'ramarks' => 'You account was successfully credited on the '.$data['paid_at'],
        ]);
        $user->update([
            'wallet_bal' => $user->wallet_bal + $amount,
        ]);
        toast('Wallet deposit was successful','success');
        return view('success', ['amount'=> $amount_]);
    }
}
