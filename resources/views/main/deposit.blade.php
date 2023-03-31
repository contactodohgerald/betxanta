<div class="deposit-with-tab">
    <div class="row">
        <div class="col-xxl-4 col-xl-8 offset-xl-2">
            <div class="balance-area mb-4">
                <p class="mdr text-center">Avaliable Balance</p>
                <h6>{{ number_format($_user->toView($_user->wallet_bal)) }} <span>{{ $_user->currency_rate->symbol }}</span></h6>
            </div>
        </div>
        <div class="col-xxl-8 col-xl-12">
            <div class="buy-crypto">
                <div class="row">
                    <div class="col-12">
                        <div class="main-content">
                            <h5>Fund You Wallet</h5>
                            <p>Once payment is completed, your cryptocurrency will be available in
                                your {{ config('app.name', 'Laravel') }} wallet within minutes</p>
                            <div class="form-box">
                                <form action="{{ route('iniate-payment') }}" method="POST">@csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-single">
                                                <label for="payment_method">Payment Methods</label>
                                                <div class="input-area">
                                                    <select name="payment_method" id="payment_method" required>
                                                        <option value="paystack">Paystack</option>
                                                        <option value="perfect_money">Perfect Money</option>
                                                        <option value="flutterwave">Flutterwave</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-single">
                                                <label for="amount">Amount</label>
                                                <div class="input-select d-flex align-items-center">
                                                    <input type="number" name="amount" id="amount" placeholder="min : 500" min="500" required>
                                                    <select>
                                                        <option value="1">NGN</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="cmn-btn">Proceed With Payment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-area">
                <div class="bottom-area">
                    <div class="single-item">
                        <h6>Notice :</h6>
                        <p>You will be redirected to a secure page to continue with your payment. After which you will directed back here..</p>
                        <p>Funds topup might delayed to reflect on your wallet depending on your network</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>