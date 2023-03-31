<div class="bets-tab">
    <div class="d-flex">
        <ul class="nav" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="cmn-btn active" id="open-playing-tab" data-bs-toggle="tab" data-bs-target="#open-playing" type="button" role="tab" aria-controls="open-playing" aria-selected="true">Open
                    Playing</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="cmn-btn" id="finished-tab" data-bs-toggle="tab" data-bs-target="#finished" type="button" role="tab" aria-controls="finished" aria-selected="false">Completed</button>
            </li>
        </ul>
    </div>
    <div class="bet-this-game">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="open-playing" role="tabpanel" aria-labelledby="open-playing-tab">
                @forelse ($ongoing_bets as $bet)
                    <div class="single-area">
                        <div class="head-area d-flex align-items-center">
                            <p>{{ \Carbon\Carbon::parse($bet->game_date)->toRfc850String() }}</p>
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
                                    <x-buk-countdown :expires="\Carbon\Carbon::parse($bet->games->game_date)">
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
                            <button type="button" disabled class="cmn-btn">Place Bet</button>
                        </div>
                    </div>
                @empty
                    <div class="single-area">
                        <p class="text-center">No Game Data Avaliable At The Moment, Check Back Later</p>
                    </div>
                @endforelse
                <div class="col-lg-12 d-flex justify-content-center">
                    <nav aria-label="Page navigation" class="d-flex justify-content-center">
                        <ul class="pagination justify-content-center align-items-center">
                            <li class="page-item">
                                <a class="page-btn previous" href="{{ $ongoing_bets->previousPageUrl() }}" aria-label="Previous">
                                    <img src="{{ asset('images/icon-arrow-left.png') }}" alt="icon">
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link xlr active" href="javascript:void(0)">{{ $ongoing_bets->currentPage() }}</a></li>
                            <li class="page-item">
                                <a class="page-btn next" href="{{ $ongoing_bets->nextPageUrl() }}" aria-label="Next">
                                    <img src="{{ asset('images/icon-arrow-right.png') }}" alt="icon">
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="tab-pane fade" id="finished" role="tabpanel" aria-labelledby="finished-tab">
                @forelse ($completed_bets as $bet)
                    <div class="single-area">
                        <div class="head-area d-flex align-items-center">
                            <p>{{ \Carbon\Carbon::parse($bet->game_date)->toRfc850String() }}</p>
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
                                    <x-buk-countdown :expires="\Carbon\Carbon::parse($bet->games->game_date)">
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
                            <button type="button" disabled class="cmn-btn">Place Bet</button>
                        </div>
                    </div>
                @empty
                    <div class="single-area">
                        <p class="text-center">No Game Data Avaliable At The Moment, Check Back Later</p>
                    </div>
                @endforelse
                <div class="col-lg-12 d-flex justify-content-center">
                    <nav aria-label="Page navigation" class="d-flex justify-content-center">
                        <ul class="pagination justify-content-center align-items-center">
                            <li class="page-item">
                                <a class="page-btn previous" href="{{ $completed_bets->previousPageUrl() }}" aria-label="Previous">
                                    <img src="{{ asset('images/icon-arrow-left.png') }}" alt="icon">
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link xlr active" href="javascript:void(0)">{{ $completed_bets->currentPage() }}</a></li>
                            <li class="page-item">
                                <a class="page-btn next" href="{{ $completed_bets->nextPageUrl() }}" aria-label="Next">
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