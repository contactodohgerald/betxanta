<?php

namespace App\Http\Controllers\Withdrawal;

use App\Http\Controllers\Controller;
use App\Models\BankList;
use App\Models\CurrencyRate;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserAccount;
use App\Models\WithdrawalRequest;
use App\Notifications\GeneralNotification;
use App\Services\Paystack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Trait\CurrencyHandler;


class WithdrawalController extends Controller
{
    use CurrencyHandler;

    function __construct(
        private UserAccount $userAccount, private WithdrawalRequest $withdrawalRequest, 
        private BankList $bankList, private User $user, private Transaction $transaction, private CurrencyRate $currencyRate
    )
    {
        $this->userAccount = $userAccount;
        $this->withdrawalRequest = $withdrawalRequest;
        $this->bankList = $bankList;
        $this->user = $user;
        $this->transaction = $transaction;
    }

    public function createWithdrawal(Request $request)
    {
        $user = $request->user();
        $request->validate([
            'wallet_type' => ['required', 'string'],
            'payment_channel' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
        ]);

        $bank_acct = $this->userAccount->where('id', $request->payment_channel)->first();
        if($bank_acct == null){
            toast('Please setup your bank account details, before creating a withdrawal', 'error');
            return redirect()->back();
        }
        
        $_amount = $this->processExchangeRate($request->amount, 'to_db', $user->id);
        if($request->wallet_type == 'main_bal'){
            if($_amount >= $user->wallet_bal){
                toast('Insuffient Balance', 'error');
                return redirect()->back();
            }
        }else{
            if($_amount >= $user->ref_bal){
                toast('Insuffient Balance', 'error');
                return redirect()->back();
            }
        }
       
        $withdraw = WithdrawalRequest::create([
            'user_id' => $user->id,
            'user_acct' => $request->payment_channel,
            'amount' => $_amount,
            'transfer_type' => 'withdraw',
            'trf_status' => 'pending',
        ]);

        if($request->wallet_type == 'main_bal'){
            $user->update([
                'wallet_bal' => $user->wallet_bal - $_amount,
            ]);
        }else{
            $user->update([
                'ref_bal' => $user->ref_bal - $_amount,
            ]);
        }

        $date = Carbon::now()->addHours(1)->toDateTimeString();
        $data = [
            'name' => $user->name,
            'subject' => 'Withdraw Request on '.$date,
            'message' => 'This is to notify you that '.env('APP_NAME').' recieved a request to withdraw '.$request->amount.' '.$user->currency_rate->symbol.' at '.$date,
            'body' => 'Destination Bank: '.$bank_acct->bank_name.', Account Name: '.$bank_acct->acct_name.', Account Number: '.$bank_acct->acct_number.'.  Please, imediately contact us or send us an email to, '.env('APP_MAIL').' if the account details does not belong to you.',
            'thankyou' => 'Thank you for trusting in our services',
        ];
        Notification::send($user, new GeneralNotification($data, ['mail', 'database']));

        Transaction::create([
            'user_id' => $user->id,
            'reference' => $withdraw->id,
            'type' => 'wallet-withdraw',
            'amount' => $_amount,
            'status' => false,
            'mode' => 'Paystack transfer',
            'ramarks' => 'You account was successfully debited on the '.$date,
        ]);

        toast('Your Withdrawal request was successful created','success');
        return redirect()->back();
    }

    public function withdrawalRequest()
    {
        $view = [
            '_user' => $this->user(),
            'pending_request' => $this->withdrawalRequest->where('trf_status', 'pending')->simplePaginate(5),
            'completed_request' => $this->withdrawalRequest->where('trf_status', 'completed')->simplePaginate(10),
            'currency' => $this->currencyRate->all(),
            'country' => $this->getCountry(),
        ];
        return view('admin.withdrawals', $view);
    }

    public function verifyTransferInterface()
    {
        return view('admin.verify-transfer');
    }

    public function processSingleTransfer(Request $request, Paystack $paystack)
    {
        $user = $request->user();
        $withdrawals = $this->withdrawalRequest->where('id', $request->withdrawal_id)->first();
        $bank = $this->bankList->where('name', $withdrawals->usersAccount->bank_name)->first();
        $recipent = $paystack->transferRecipient([
            'type' => $bank->type,
            'name' => $withdrawals->usersAccount->acct_name,
            'account_number' => $withdrawals->usersAccount->acct_number,
            'bank_code' => $bank->code,
            'currency' => $bank->currency,
        ]);
        if(!$recipent['status']){
            toast($recipent['message'], 'error');
            return redirect()->back();
        }
        $amount = $user->toView($withdrawals->amount);
        $transfer = $paystack->initiateTransfer([
            'source' => "balance",
            'amount' => floor($amount * 100),
            "reference" => $withdrawals->id,
            'recipient' => $recipent['data']['recipient_code'],
            'reason' => "Withdrawal request Payment of ".number_format($amount).$user->currency_rate->symbol." to ".$withdrawals->usersAccount->acct_name.", ".$withdrawals->usersAccount->bank_name." (".$withdrawals->usersAccount->acct_number.")"
        ]);
        if(!$transfer['status']){
            toast($transfer['message'], 'error');
            return redirect()->back();
        }
        $data = $transfer['data'];
        return redirect()->route('verify-transfer')->with(['transfer_code'=>$data['transfer_code'], 'reference'=>$data['reference'] ]);
    }

    public function verifyOTP(Request $request, Paystack $paystack)
    {
        $response = $paystack->finalizeTransfer([
            "transfer_code" => $request->transfer_code, 
            "otp" => $request->otp
        ]);
        if(!$response['status']){
            toast($response['message'], 'error');
            return redirect()->back();
        }
        if($response['status']){
            $withdrawals = $this->withdrawalRequest->where('id', $request->reference)->first();
            if($withdrawals != null){
                $withdrawals->update([
                    'trf_status' => 'completed',
                    'status' => true,
                ]);
                $user = $this->user->where('id', $withdrawals->user_id)->first();
                $date = Carbon::now()->addHours(1)->toDateTimeString();
                $data = [
                    'name' => $user->name,
                    'subject' => 'Withdraw Comfirmation on '.$date,
                    'message' => 'This is to notify you about the successful transfer of '.$user->toView($withdrawals->amount).' '.$user->currency_rate->symbol.' into your '.$withdrawals->usersAccount->bank_name.' with the account number of : '.$withdrawals->usersAccount->acct_name.' and account name of '.$withdrawals->usersAccount->acct_number,
                    'body' => 'This is an atomated notification. For enquiries on '.env('APP_NAME').' services. please send an email to '.env('APP_MAIL'),
                    'thankyou' => 'Thank you for trusting in our services',
                ];
                Notification::send($user, new GeneralNotification($data, ['mail', 'database']));
            }
            toast($response['message'], 'success');
            return redirect()->to('withdraw-request');
        }
        
        toast($response['message'], 'error');
        return redirect()->to('withdraw-request');
    }

    public function transactionInterface()
    {
        $transactions = $this->transaction->simplePaginate(10);
        $view = [
            'transactions' => $transactions,
            '_user' => $this->user(),
            'currency' => $this->currencyRate->all(),
            'country' => $this->getCountry(),
        ];
        return view('admin.transactions', $view);
    }

    public function deleteWithdrawal(Request $request)
    {
        $withdrawal = $this->withdrawalRequest->where('id', $request->withdrawal_id)->first();
        if($withdrawal == null){
            toast('An error occured, could not process request at this time', 'error');
            return redirect()->back();
        }
        $withdrawal->delete();
        toast('Withdrawal request deleted successfully', 'success');
        return redirect()->back();
    }

    public function deleteTransaction(Request $request)
    {
        $transaction = $this->transaction->where('id', $request->transaction_id)->first();
        if($transaction == null){
            toast('An error occured, could not process request at this time', 'error');
            return redirect()->back();
        }
        $transaction->delete();
        toast('Transaction deleted successfully', 'success');
        return redirect()->back();
    }




}
