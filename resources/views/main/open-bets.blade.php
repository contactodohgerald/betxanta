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

    <!-- Bet This Game start -->
    <section class="bet-this-game">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header text-center">
                            <h5 class="sub-title">Open Bets For {{ $category_details->name }}</h5>
                            <p>Use the power of {{ env('APP_NAME') }} Fast, Anonymous, Secured, Automatic, Trustworthy</p>
                        </div>
                    </div>
                </div>
                <div class="row cus-mar">
                    @forelse ($open_bets as $bet)
                        <div class="col-lg-6">
                            <div class="single-area">
                                <div class="head-area d-flex align-items-center">
                                    <p>Options : </p>
                                    @if ($bet->draw == null)
                                        <span>Draw Or</span>
                                    @endif
                                    @if($bet->first_team == null)
                                        <span>{{ $bet->games->frst_team->name }} Will Win</span>
                                    @endif
                                    @if($bet->last_team == null)
                                        <span>{{ $bet->games->second_team->name }} Will Win</span>
                                    @endif
                                    @if($bet->frst_team !== '' and $bet->draw !== '' and $bet->last_team !== '')
                                        <span>This bet is all booked!</span>
                                    @endif
                                </div>
                                <div class="main-content">
                                    <div class="team-single">
                                        <h4>{{ $bet->games->frst_team->name }}</h4>
                                        <span class="mdr">{{ $bet->games->location_a }}</span>
                                        <div class="img-area">
                                            <img src="{{ asset($bet->games->frst_team->logo) }}" width="100" height="100" alt="image">
                                        </div>
                                    </div>
                                    <div class="mid-area text-center">
                                        <div class="countdown d-flex align-items-center justify-content-center">
                                            <x-buk-countdown :expires="\Carbon\Carbon::parse($bet->game_date)">
                                                <span x-text="timer.days" class="hours">{{ $component->days() }}</span><span class="ref">d</span><span class="seperator">:</span>
                                                <span x-text="timer.hours" class="hours">{{ $component->hours() }}</span><span class="ref">h</span><span class="seperator">:</span>
                                                <span x-text="timer.minutes" class="minutes">{{ $component->minutes() }}</span><span class="ref">m</span><span class="seperator">:</span>
                                                <span x-text="timer.seconds" class="seconds">{{ $component->seconds() }}</span><span class="ref">s</span>
                                            </x-buk-countdown>
                                        </div>
                                        <h6>League - {{ $bet->games->league->name }}</h6>
                                    </div>
                                    <div class="team-single">
                                        <h4>{{ $bet->games->second_team->name }}</h4>
                                        <span class="mdr">{{ $bet->games->location_b }}</span>
                                        <div class="img-area">
                                            <img src="{{ asset($bet->games->second_team->logo) }}" width="100" height="100" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-item">
                                    @auth
                                        <button type="button" class="cmn-btn" onclick="placeBetByUser('{{ $bet->games }}')">Place Bet</button>
                                    @else
                                        <button type="button" class="cmn-btn" data-bs-toggle="modal" data-bs-target="#loginMod">Place Bet</button>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="single-area">
                            <p class="text-center">No Opened Bets Avaliable At The Moment, Check Back Later</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- Bet This Game end -->
@endsection