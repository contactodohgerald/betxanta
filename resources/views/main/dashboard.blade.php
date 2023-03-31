@extends('main.layout')

@section('content')
    <!-- Dashboard Content Section start -->
    <section class="dashboard-content pt-120">
        <div class="overlay">
            
            <div class="dashboard-heading">
                <div class="container">
                    <div class="row justify-content-lg-end justify-content-between">
                        <div class="col-xl-9 col-lg-12">
                            <ul class="nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">dashboard</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="my-bets-tab" data-bs-toggle="tab" data-bs-target="#my-bets" type="button" role="tab" aria-controls="my-bets" aria-selected="false">my bets</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="deposit-tab" data-bs-toggle="tab" data-bs-target="#deposit" type="button" role="tab" aria-controls="deposit" aria-selected="false">deposit</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="withdraw-tab" data-bs-toggle="tab" data-bs-target="#withdraw" type="button" role="tab" aria-controls="withdraw" aria-selected="false">withdraw</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="affiliate-tab" data-bs-toggle="tab" data-bs-target="#affiliate" type="button" role="tab" aria-controls="affiliate" aria-selected="false">affiliate</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="transactions-tab" data-bs-toggle="tab" data-bs-target="#transactions" type="button" role="tab" aria-controls="transactions" aria-selected="false">transactions</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting" type="button" role="tab" aria-controls="setting" aria-selected="false">setting</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="dashboard-sidebar">
                            <div class="single-item">
                                <img src="{{ asset($_user->photo_url) }}" alt="{{ $_user->name }}" height="100" width="100">
                                <h5>{{ $_user->name }}</h5>
                                <p>{{ $_user->email }}</p>
                            </div>
                            <div class="balance">
                                <div class="single-item">
                                    <img src="{{ asset('images/icon-dashboard-sidebar-icon-1.png') }}" alt="images">
                                    <h5>{{ number_format($_user->toView($_user->wallet_bal)) }} {{ $_user->currency_rate->symbol }}</h5>
                                    <p>Available Balance</p>
                                </div>
                                <div class="bottom-area d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0)" class="mdr withdraw-btn">Withdraw</a>
                                    <a href="javascript:void(0)" class="mdr deposit-btn">Deposit</a>
                                </div>
                            </div>
                            <div class="single-item">
                                <img src="images/icon-dashboard-sidebar-icon-2.png" alt="images">
                                <h5>Need Help?</h5>
                                <p class="mdr">Have questions? Our experts are here to help!.</p>
                                <span class="btn-border">
                                    <a href="{{ route('contact-us') }}" class="cmn-btn">Get Start Now</a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="single-info">
                                            <img src="images/icon-user-info-icon-1.png" alt="icon">
                                            <div class="text-area">
                                                <h4>678</h4>
                                                <p class="mdr">Total Match</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="single-info">
                                            <img src="images/icon-user-info-icon-2.png" alt="icon">
                                            <div class="text-area">
                                                <h4>91%</h4>
                                                <p class="mdr">Win Ratio</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-6">
                                        <div class="single-info">
                                            <img src="images/icon-user-info-icon-3.png" alt="icon">
                                            <div class="text-area">
                                                <h4>22</h4>
                                                <p class="mdr">Achievements</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- transaction section --}}
                                    @include('main.transaction')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="my-bets" role="tabpanel" aria-labelledby="my-bets-tab">
                                {{-- show user's bet history --}}
                                @include('main.my-bets')
                            </div>

                            <div class="tab-pane fade" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
                                {{-- show deposit section --}}
                                @include('main.deposit')
                            </div>
                            
                            <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">
                                {{-- withdrawal section --}}
                               @include('main.withdrawal')
                            </div>
                            
                            <div class="tab-pane fade" id="affiliate" role="tabpanel" aria-labelledby="affiliate-tab">
                                {{-- affiliate section --}}
                                @include('main.referrer')
                            </div>
                            <div class="tab-pane fade" id="transactions" role="tabpanel" aria-labelledby="transactions-tab">
                                <div class="transactions-tab">
                                    <div class="head-area">
                                        <form action="#" method="POST">@csrf
                                            <div class="single-input">
                                                <label for="filter_date">Month</label>
                                                <input type="date" name="filter_date" id="filter_date" required>
                                            </div>
                                            <div class="text-end">
                                                <button>Filter</button>
                                            </div>
                                        </form>
                                    </div>
                                    @include('main.transaction')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                               {{-- user settings section --}}
                               @include('main.settings')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Content Section end -->
@endsection

   