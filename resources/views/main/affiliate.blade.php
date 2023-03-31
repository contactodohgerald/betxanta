@extends('main.layout')

@section('content')
     <!-- Banner Section start -->
     <section class="banner-section inner-banner affiliate">
        <div class="overlay">
            <div class="shape-area">
                <img src="{{ asset('images/images-affiliate-banner.png') }}" class="affiliate-illu" alt="image">
            </div>
            <div class="banner-content">
                <div class="container">
                    <div class="content-shape">
                        <img src="{{ env('images/images-sell-hero-illus.png') }}" class="obj-8" alt="image">
                    </div>
                    <div class="row">
                        <div class="col-lg-9 col-md-10">
                            <div class="main-content">
                                <h1>Affiliate</h1>
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb d-flex align-items-center">
                                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Affiliate</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section end -->

    <!-- Bitbetio Affiliates In start -->
    <section class="bitbetio-affiliates">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5 order-lg-0 order-1">
                        <div class="img-area d-rtl">
                            <img src="images/images-affiliates-illus.png" class="max-un" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header">
                            <h5 class="sub-title">Grow your Earnings With {{ env('APP_NAME') }}</h5>
                            <h3 class="title">Earn more with {{ env('APP_NAME') }} Referral Program</h3>
                            <p>The most advanced and rewarding affiliate program on the market. It's time to start your profitable endeavor with a trusted and licensed partner. With up to {{ env('REF_PERCENT') }}% referral comission on every winnings by referee for a life time.</p>
                            <ul>
                                <li>Generous commissions {{ env('REF_PERCENT') }}%  &amp; fast payouts</li>
                                <li>The fee commission will be sent instantly in real-time to your referral wallet</li>
                                <li>There is no limit to the number of friends you can refer</li>
                                <li>Each referee must be signed up through your Referral Link or Referral ID.
                                </li>
                            </ul>
                        </div>
                        <span class="btn-border">
                            <button type="button" class="cmn-btn reg" data-bs-toggle="modal" data-bs-target="#loginMod">
                                Join Now
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bitbetio Affiliates In end -->

    <!-- Features Section In start -->
    <section class="features-section">
        <div class="overlay pb-120">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <div class="section-header">
                            <h5 class="sub-title">Grow your Earnings With {{ env('APP_NAME') }}</h5>
                            <h4 class="title">Why you should sign up to the {{ env('APP_NAME') }} Affiliate Program</h4>
                            <p>Earning is easy when you&rsquo;re promoting {{ env('APP_NAME') }}. Become an {{ env('APP_NAME') }} today!</p>
                        </div>
                        <div class="row cus-mar">
                            <div class="col-sm-6">
                                <div class="single-area text-center">
                                    <div class="img-area">
                                        <img src="{{ asset('images/icon-features-icon-1.png') }}" alt="image">
                                    </div>
                                    <h5>Flexible Commission</h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-area text-center">
                                    <div class="img-area">
                                        <img src="{{ asset('images/icon-features-icon-2.png') }}" alt="image">
                                    </div>
                                    <h5>Track Payouts</h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-area text-center">
                                    <div class="img-area">
                                        <img src="{{ asset('images/icon-features-icon-3.png') }}" alt="image">
                                    </div>
                                    <h5>Real-time Payouts</h5>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-area text-center">
                                    <div class="img-area">
                                        <img src="{{ asset('images/icon-features-icon-4.png') }}" alt="image">
                                    </div>
                                    <h5>Rewards as a top affiliate</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="section-img-area">
                            <img src="{{ asset('images/images-features-illus.png') }}" class="max-un" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section In end -->

    <!-- How it Works start -->
    <section class="how-it-works affiliates">
        <div class="overlay pt-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="section-header text-center">
                            <h5 class="sub-title">Earn as our affilliate</h5>
                            <h2 class="title">Be our Affiliate!</h2>
                            <p>Join the program and gain up to 50% revshare! Earn as your referrals start playing!</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-area text-center">
                                    <div class="img-area">
                                        <img src="{{ asset('images/icon-how-works-icon-6.png') }}" alt="image">
                                    </div>
                                    <h4>1.Join us!</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-area text-center">
                                    <div class="img-area">
                                        <img src="{{ asset('images/icon-how-works-icon-7.png') }}" alt="image">
                                    </div>
                                    <h4>2.Start Inviting!</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-area text-center">
                                    <div class="img-area">
                                        <img src="{{ asset('images/icon-how-works-icon-8.png') }}" alt="image">
                                    </div>
                                    <h4>3.Get Paid</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How it Works end -->

@endsection