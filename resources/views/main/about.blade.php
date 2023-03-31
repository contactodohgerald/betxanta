@extends('main.layout')


@section('content')
    <!-- Banner Section start -->
    <section class="banner-section inner-banner contact">
        <div class="overlay">
            <div class="shape-area">
                <img src="{{ asset('images/images-index-bg.png') }}" class="contact-illu" alt="image">
            </div>
            <div class="banner-content">
                <div class="container">
                    <div class="content-shape">
                        <img src="{{ asset('images/images-coin-1.png')}}" class="obj-1" alt="image">
                        <img src="{{ asset('images/images-coin-3.png')}}" class="obj-2" alt="image">
                        <img src="{{ asset('images/images-coin-3.png')}}" class="obj-3" alt="image">
                        <img src="{{ asset('images/images-coin-4.png')}}" class="obj-4" alt="image">
                    </div>
                    <div class="row">
                        <div class="col-lg-9 col-md-10">
                            <div class="main-content">
                                <h1>About Us</h1>
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb d-flex align-items-center">
                                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
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

    <!-- Affilliate start -->
    <section class="affilliate-section">
        <div class="overlay pt-120">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5 order-lg-0 order-1">
                        <div class="img-area d-rtl">
                            <img src="{{ asset('images/images-more-features-image.png') }}" alt="image"  class="max-un">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-text">
                            <h5 class="sub-title">A Next-Level Sports Betting</h5>
                            <h2 class="title">Know About Us</h2>
                            <p>Our platform has been designed from the ground up to be tailored to the unique form of betting and settlement.  Bet against fellow Players on who wins, loses or draws a match with equal stakes.  Follow these simple steps and make profits! </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Affilliate end -->

    <!-- More About start -->
    <section class="more-features">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="content-area">
                            <div class="single-item">
                                <div class="image-area">
                                    <img src="{{ asset('images/icon-more-features-icon-1.png') }}" alt="image">
                                </div>
                                <div class="text-area">
                                    <h5>Open Ticket / Bet</h5>
                                    <p>Open a bet / ticket by selecting an a possible event and choosing the outcome, then stake the amount of your choice and submit. </p>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="image-area">
                                    <img src="{{ asset('images/icon-more-features-icon-2.png') }}" alt="image">
                                </div>
                                <div class="text-area">
                                    <h5>Head to head betting</h5>
                                    <p>One or two more Players will bet against your ticket with an equal stake. The ticket is then closed pending the live outcome of the event...</p>
                                </div>
                            </div>
                            <div class="single-item">
                                <div class="image-area">
                                    <img src="{{ asset('images/icon-more-features-icon-3.png') }}" alt="image">
                                </div>
                                <div class="text-area">
                                    <h5>Bet - Outcomes</h5>
                                    <p>The player with the winning outcome wins the total stake (Minus Betwewe {{ env('COMISSION') }}% Service Charge) Or You can select an already open ticket with the opposite of your selection and bet against.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-0 order-1">
                        <div class="img-area">
                            <img src="{{ asset('images/images-more-features-image.png') }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- More About end -->
@endsection