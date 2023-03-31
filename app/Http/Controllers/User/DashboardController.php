<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BankList;
use App\Models\Bet;
use App\Models\Category;
use App\Models\CurrencyRate;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserAccount;
use App\Models\WithdrawalRequest;
use App\Services\Paystack;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function __construct(
        private Category $category, private Transaction $transaction, 
        private Bet $bet, private BankList $bankList, 
        private UserAccount $userAccount, private WithdrawalRequest $withdrawalRequest,
    )
    {
        $this->category = $category;
        $this->transaction = $transaction;
        $this->bet = $bet;
        $this->bankList = $bankList;
        $this->userAccount = $userAccount;
        $this->withdrawalRequest = $withdrawalRequest;
    }

    public function dashboardPage()
    {
        $transactions = $this->transaction->where('user_id', $this->user()->id)->simplePaginate(10);
        $view = [
            'currency' => CurrencyRate::all(),
            'country' => $this->getCountry(),
            '_user' => $this->user(),
            'category' => $this->category->all(),
            'transactions' => $transactions,
            'ongoing_bets' => $this->getUserBet('ongoing', 5),
            'completed_bets' => $this->getUserBet('completed', 5),
            'banks' => $this->bankList->where('status', true)->get(),
            'user_accounts' => $this->userAccount->where('user_id', $this->user()->id)->where('status', true)->get(),
            'withdrawalRequests' => $this->withdrawalRequest->where('user_id', $this->user()->id)->simplePaginate(10),
            'referrals' => User::where('referred', $this->user()->referral)->simplePaginate(10),
        ];
        return view('main.dashboard', $view);
    } 

    public function getUserBet($option, $count)
    {
        return $this->bet->where('bet_status', $option)
        ->where('first_team', $this->user()->id)
        ->orWhere('draw', $this->user()->id)
        ->orWhere('last_team', $this->user()->id)
        ->simplePaginate($count);
    }

    public function verifyAccountNumber(Request $request, Paystack $paystack)
    {
        $user = $request->user();
        $request->validate([
            'bank_code' => ['required', 'string'],
            'acct_no' => ['required', 'numeric'],
        ]);

        $acctDetails = $paystack->verifyAccountDetail($request->acct_no, $request->bank_code);
        if(!$acctDetails['status']){
            toast($acctDetails['message'], 'error');
            return redirect()->back();
        }
        $bank = $this->bankList->where('code', $request->bank_code)->first();

        $user_account = $this->userAccount->where('user_id', $user->id)->where('bank_name', $bank->name)->first();
        if($user_account != null){
            $user_account->update([
                'acct_number' => $acctDetails['data']['account_number'],
                'acct_name' => $acctDetails['data']['account_name'],
                'bank_id' => $acctDetails['data']['bank_id'],
            ]);
            toast('Account details was verified successfully', 'success');
            return redirect()->back();
        }

        $this->userAccount->create([
            'user_id' => $user->id,
            'bank_id' => $acctDetails['data']['bank_id'],
            'bank_name' => $bank->name,
            'acct_name' => $acctDetails['data']['account_name'],
            'acct_number' => $acctDetails['data']['account_number'],        
        ]);
       
        toast('Account details was verified successfully', 'success');
        return redirect()->back();
    }

    public function updateUserPaymentDetails(Request $request)
    {
       return $request;
    }

}
