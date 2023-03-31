<div class="deposit-with-tab withdraw">
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="single-info mb-4">
                <img src="images/icon-user-info-icon-2.png" alt="icon">
                <div class="text-area">
                    <h4>{{ number_format($_user->toView($_user->wallet_bal)) }} <span>{{ $_user->currency_rate->symbol }}</span></h4>
                    <p class="mdr">Avaliable Main Balance</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="single-info mb-4">
                <img src="images/icon-user-info-icon-3.png" alt="icon">
                <div class="text-area">
                    <h4>{{ number_format($_user->toView($_user->ref_bal)) }} <span>{{ $_user->currency_rate->symbol }}</span></h4>
                    <p class="mdr">Avaliable Referral Balance</p>
                </div>
            </div>
        </div>

        <div class="col-xxl-12 col-xl-12">
            <div class="buy-crypto">
                <div class="row">
                    <div class="col-12">
                        <div class="main-content">
                            <h5>Withdraw {{ $_user->currency_rate->symbol }} From Your Wallet</h5>
                            <div class="form-box">
                                <form action="{{ route('create-withdrawal') }}" method="POST">@csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-single">
                                                <label for="wallet_type">Select Wallet</label>
                                                <div class="input-area">
                                                    <select name="wallet_type" id="wallet_type" required>
                                                        <option value="main_bal">{{ number_format($_user->toView($_user->wallet_bal)) }} ({{ $_user->currency_rate->symbol }})</option>
                                                        <option value="ref_bal">{{ number_format($_user->toView($_user->ref_bal)) }} ({{ $_user->currency_rate->symbol }})</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-single">
                                                <label for="amount">Amount ({{ $_user->currency_rate->symbol }})</label>
                                                <div class="input-area">
                                                    <input type="number" name="amount" id="amount" placeholder="Enter Amount ({{ $_user->currency_rate->symbol }})" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-single">
                                                <label for="payment_channel">Select Account</label>
                                                <div class="input-area">
                                                    <select name="payment_channel" id="payment_channel" required>
                                                        @forelse ($user_accounts as $user_account)
                                                            <option value="{{ $user_account->id }}">{{ $user_account->bank_name }} ({{ $user_account->acct_number }})</option>
                                                        @empty
                                                            <option value="">No Data At Moment</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-single">
                                                <button type="submit" class="cmn-btn">Create Withdraw Invoice</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-area">
                            <div class="head-area d-flex justify-content-between align-items-center">
                                <h5>Withdrawal Request</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">S/N</th>
                                            <th scope="col">Bank Name</th>
                                            <th scope="col">Acct Number</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @forelse ($withdrawalRequests as $withdraw_request)
                                            <tr>
                                                <th scope="row">{{ $counter++ }}</th>
                                                <td>{{ $withdraw_request->usersAccount->bank_name }}</td>
                                                <td>{{ $withdraw_request->usersAccount->acct_number }}</td>
                                                <td>{{ number_format($_user->toView($withdraw_request->amount)) }} {{ $_user->currency_rate->symbol  }}</td>
                                                <td>{{ $withdraw_request->transfer_type }}</td>
                                                <td>
                                                    <span style="color: #{{ ($withdraw_request->trf_status == 'pending')?'fa2407':'00ff6d'}}">{{ ($withdraw_request->trf_status == 'pending')?'Pending':'Successfull'}}</span>
                                                </td>
                                                <td>{{ $withdraw_request->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <th colspan="10">No Data Avaliable At The Moment</th>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-center mt-60">
                        <nav aria-label="Page navigation" class="d-flex justify-content-center">
                            <ul class="pagination justify-content-center align-items-center">
                                <li class="page-item">
                                    <a class="page-btn previous" href="{{ $withdrawalRequests->previousPageUrl() }}" aria-label="Previous">
                                        <img src="{{ asset('images/icon-arrow-left.png') }}" alt="icon">
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link xlr active" href="javascript:void(0)">{{ $withdrawalRequests->currentPage() }}</a></li>
                                <li class="page-item">
                                    <a class="page-btn next" href="{{ $withdrawalRequests->nextPageUrl() }}" aria-label="Next">
                                        <img src="{{ asset('images/icon-arrow-right.png') }}" alt="icon">
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>