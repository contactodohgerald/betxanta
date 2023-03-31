@extends('main.layout')

@section('content')
     <!-- Banner Section start -->
     <section class="banner-section inner-banner soccer-bets">
        <div class="overlay">
            <div class="shape-area">
                <img src="{{ asset('images/images-winner-cup.png')}}" class="obj-1" alt="image">
                <img src="{{ asset('images/images-coin-1.png')}}" class="obj-1" alt="image">
                <img src="{{ asset('images/images-coin-2.png')}}" class="obj-2" alt="image">
                <img src="{{ asset('images/images-coin-3.png')}}" class="obj-3" alt="image">
                <img src="{{ asset('images/images-coin-4.png')}}" class="obj-4" alt="image">
                <img src="{{ asset('images/images-coin-5.png')}}" class="obj-5" alt="image">
                <img src="{{ asset('images/images-coin-6.png')}}" class="obj-6" alt="image">
            </div>
            <div class="banner-content">
                <div class="container">
                    <div class="content-shape">
                        <img src="{{ asset('images/images-coin-1.png')}}" class="obj-8" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section end -->

    <!-- All Soccer Bets start -->
    <section class="bet-this-game all-soccer-bets bets-2">
        <div class="overlay">
            <div class="container">
                <div class="filter-section mb-2">
                    <div class="section-text text-center">
                        <h3>Place Your Bet on {{ env('APP_NAME') }}</h3>
                    </div>
                </div>
                <div class="row cus-mar">
                    <div class="col-xxl-3 col-lg-4">
                        <div class="sidebar position-sticky top-0">
                            <div class="single-sidebar">
                                <h5 class="title-area m-none">Games Leagues</h5>
                                <div class="single-item">
                                    @forelse ($leagues as $league)
                                        <label class="checkbox-single d-flex align-items-center">
                                            <a href="{{ route('league-all', $league->id) }}" class="left-area">
                                                <span class="item-title d-flex align-items-center">
                                                    <img src="{{ asset($league->subcat_logo) }}" height="40" width="40" alt="icon">
                                                    <span>{{ $league->name }}</span>
                                                </span>
                                            </a>
                                        </label>
                                    @empty
                                        <label class="checkbox-single d-flex align-items-center">
                                            <span class="left-area">
                                                <p>No Leagues Available At The Moment</p>
                                            </span>
                                        </label> 
                                    @endforelse
                                </div>
                            </div>
                            <div class="single-sidebar">
                                <h5 class="title-area">Games Category</h5>
                                <div class="single-item">
                                    @forelse ($category as $categories)
                                        <label class="checkbox-single d-flex align-items-center">
                                            <a href="{{ route('all', $categories->id) }}" class="left-area">
                                                <span class="item-title d-flex align-items-center">
                                                    <span>{{ $categories->name }} ({{ count($categories->sub_category) }})</span>
                                                </span>
                                            </a>
                                        </label>
                                    @empty
                                        <label class="checkbox-single d-flex align-items-center">
                                            <span class="left-area">
                                                <p>No Categories Available At The Moment</p>
                                            </span>
                                        </label>
                                    @endforelse
                                </div>
                            </div>
                            @auth()
                                <div class="single-sidebar">
                                    <h5 class="title-area">Open Bets</h5>
                                    <div class="single-item">
                                        @forelse ($category as $categories)
                                            <label class="checkbox-single d-flex align-items-center">
                                                <a href="{{ route('open-bets', $categories->id) }}" class="left-area">
                                                    <span class="item-title d-flex align-items-center">
                                                        <span>{{ $categories->name }} ({{ count($categories->sub_category) }})</span>
                                                    </span>
                                                </a>
                                            </label>
                                        @empty
                                            <label class="checkbox-single d-flex align-items-center">
                                                <span class="left-area">
                                                    <p>No Categories Available At The Moment</p>
                                                </span>
                                            </label>
                                        @endforelse
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                    <div class="col-xxl-9 col-lg-8">
                        @forelse ($games as $game)
                            <div class="single-area">
                                <div class="head-area d-flex align-items-center">
                                    <p>{{ \Carbon\Carbon::parse($game->game_date)->toRfc850String() }}</p>
                                </div>
                                <div class="main-content">
                                    <div class="team-single">
                                        <h4>{{ $game->frst_team->name }}</h4>
                                        <span class="mdr">{{ $game->location_a }}</span>
                                        <div class="img-area">
                                            <img src="{{ asset($game->frst_team->logo) }}" width="100" height="100" alt="image">
                                        </div>
                                    </div>
                                    <div class="mid-area text-center">
                                        <div class="countdown d-flex align-items-center justify-content-center">
                                            <x-buk-countdown :expires="\Carbon\Carbon::parse($game->game_date)">
                                                <span x-text="timer.days" class="hours">{{ $component->days() }}</span><span class="ref">d</span><span class="seperator">:</span>
                                                <span x-text="timer.hours" class="hours">{{ $component->hours() }}</span><span class="ref">h</span><span class="seperator">:</span>
                                                <span x-text="timer.minutes" class="minutes">{{ $component->minutes() }}</span><span class="ref">m</span><span class="seperator">:</span>
                                                <span x-text="timer.seconds" class="seconds">{{ $component->seconds() }}</span><span class="ref">s</span>
                                            </x-buk-countdown>
                                        </div>
                                        <h6>League - {{ $game->league->name }}</h6>
                                    </div>
                                    <div class="team-single">
                                        <h4>{{ $game->second_team->name }}</h4>
                                        <span class="mdr">{{ $game->location_b }}</span>
                                        <div class="img-area">
                                            <img src="{{ asset($game->second_team->logo) }}" width="100" height="100" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-item">
                                    @auth
                                        <button type="button" class="cmn-btn" onclick="placeBetByUser('{{ $game }}')">Place Bet</button>
                                    @else
                                        <button type="button" class="cmn-btn" data-bs-toggle="modal" data-bs-target="#loginMod">Place Bet</button>
                                    @endauth
                                </div>
                            </div>
                        @empty
                            <div class="single-area">
                                <p class="text-center">No Game Data Avaliable At The Moment, Check Back Later</p>
                            </div>
                        @endforelse
                        <div class="row mt-60">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <nav aria-label="Page navigation" class="d-flex justify-content-center">
                                    <ul class="pagination justify-content-center align-items-center">
                                        <li class="page-item">
                                            <a class="page-btn previous" href="{{ $games->previousPageUrl() }}" aria-label="Previous">
                                                <img src="{{ asset('images/icon-arrow-left.png') }}" alt="icon">
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link xlr active" href="javascript:void(0)">{{ $games->currentPage() }}</a></li>
                                        <li class="page-item">
                                            <a class="page-btn next" href="{{ $games->nextPageUrl() }}" aria-label="Next">
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
    </section>
    <!-- All Soccer Bets end -->

    <!-- How it Works start -->
    <section class="how-it-works">
        <div class="overlay pt-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header text-center">
                            <h5 class="sub-title">Get to Know</h5>
                            <h2 class="title">How {{ env('APP_NAME') }} Works?</h2>
                            <p>Our platform has been designed from the ground up to be tailored to the unique form of
                                betting among fellow players (peer to peer bet) as we foundly call it. Follow these simple steps and make profits!</p>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-5">
                            <ul class="nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <h5 class="nav-link active" id="sport-tab" data-bs-toggle="tab" data-bs-target="#sport" role="tab" aria-controls="sport" aria-selected="true">
                                        <span class="image-area">
                                            <img src="images/icon-how-works-icon-1.png" alt="icon">
                                        </span>
                                        Choose a sport
                                    </h5>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <h5 class="nav-link" id="match-tab" data-bs-toggle="tab" data-bs-target="#match" role="tab" aria-controls="match" aria-selected="false">
                                        <span class="image-area">
                                            <img src="images/icon-how-works-icon-2.png" alt="icon">
                                        </span>
                                        Choose a match
                                    </h5>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <h5 class="nav-link" id="team-tab" data-bs-toggle="tab" data-bs-target="#team" role="tab" aria-controls="team" aria-selected="false">
                                        <span class="image-area">
                                            <img src="images/icon-how-works-icon-3.png" alt="icon">
                                        </span>
                                        Choose your team
                                    </h5>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <h5 class="nav-link" id="amount-tab" data-bs-toggle="tab" data-bs-target="#amount" role="tab" aria-controls="amount" aria-selected="false">
                                        <span class="image-area">
                                            <img src="images/icon-how-works-icon-4.png" alt="icon">
                                        </span>
                                        Choose your amount
                                    </h5>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="sport" role="tabpanel" aria-labelledby="sport-tab">
                                    <h4>Select a Sport</h4>
                                    <div class="img-area">
                                        <img src="images/images-process-img-1.png" alt="image">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="match" role="tabpanel" aria-labelledby="match-tab">
                                    <h4>Select a Match</h4>
                                    <div class="img-area">
                                        <img src="images/images-process-img-2.png" alt="image">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">
                                    <h4>Select a Team</h4>
                                    <div class="img-area">
                                        <img src="images/images-process-img-3.png" alt="image">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="amount" role="tabpanel" aria-labelledby="amount-tab">
                                    <h4>Select Bet Amount </h4>
                                    <div class="img-area">
                                        <img src="images/images-process-img-5.png" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How it Works end -->

      <!-- Amazing Features start -->
      <section class="amazing-features">
        <div class="overlay pt-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-header text-center">
                            <h5 class="sub-title">Leading bets escrow services</h5>
                            <p>Bet against fellow Players on who wins, loses or draws a match with equal stakes</p>
                        </div>
                    </div>
                </div>
                <div class="features-carousel">
                    <div class="single-slide">
                        <div class="slide-content">
                            <div class="icon-area">
                                <img src="images/icon-amazing-features-icon-1.png" alt="icon">
                            </div>
                            <h5>Safety</h5>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="slide-content">
                            <div class="icon-area">
                                <img src="images/icon-amazing-features-icon-2.png" alt="icon">
                            </div>
                            <h5>Transparency</h5>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="slide-content">
                            <div class="icon-area">
                                <img src="images/icon-amazing-features-icon-3.png" alt="icon">
                            </div>
                            <h5>{{ env('COMISSION') }}% Win Commissions</h5>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="slide-content">
                            <div class="icon-area">
                                <img src="images/icon-amazing-features-icon-4.png" alt="icon">
                            </div>
                            <h5>Low Risks</h5>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="slide-content">
                            <div class="icon-area">
                                <img src="images/icon-amazing-features-icon-3.png" alt="icon">
                            </div>
                            <h5>Low Commissions</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Amazing Features end -->
@endsection