@extends('main.layout')


@section('content')

    <!-- Banner Section start -->
    <section class="banner-section inner-banner soccer-bets">
        <div class="overlay">
            <div class="shape-area">
                <img src="{{ asset('images/images-winner-cup.png" class="obj-1') }}" alt="image">
                <img src="{{ asset('images/images-coin-5.png" class="obj-2') }}" alt="image">
                <img src="{{ asset('images/images-coin-3.png" class="obj-3') }}" alt="image">
                <img src="{{ asset('images/images-coin-6.png" class="obj-4') }}" alt="image">
                <img src="{{ asset('images/images-coin-9.png" class="obj-5') }}" alt="image">
                <img src="{{ asset('images/images-coin-8.png" class="obj-6') }}" alt="image">
                <img src="{{ asset('images/images-coin-7.png" class="obj-7') }}" alt="image">
            </div>
            <div class="banner-content">
                <div class="container">
                    <div class="content-shape">
                        <img src="{{ asset('images/images-coin-1.png') }}" class="obj-8" alt="image">
                    </div>
                
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section end -->
    
    <!-- All Soccer Bets start -->
    <section class="bet-this-game all-soccer-bets">
        <div class="overlay pb-120">
            <div class="container">
                <div class="row cus-mar">
                    @forelse ($games as $game)
                        <div class="col-lg-6">
                            <div class="single-area">
                                <div class="head-area d-flex align-items-center">
                                    <p>{{ \Carbon\Carbon::parse($game->game_date)->toRfc850String() }}</p>
                                </div>
                                <div class="main-content">
                                    <div class="team-single">
                                        <h5>{{ $game->frst_team->name }}</h5>
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
                                        <h5>{{ $game->second_team->name }}</h5>
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
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <div class="single-area">
                                <p class="text-center">No Game Data Avaliable At The Moment, Check Back Later</p>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <nav aria-label="Page navigation" class="d-flex justify-content-center mt-60">
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
    </section>
    <!-- All Soccer Bets end -->
    
@endsection