<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('main.head')

<body>

    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

    <!-- header-section start -->
    <header class="header-section user-dashboard">
        <div class="overlay">
            <div class="container">
                <div class="row d-flex header-area">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/images-logo.png') }}" class="logo" alt="logo">
                        </a>
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbar-content">
                            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown main-navbar">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-auto-close="outside">All Sports</a>
                                    <ul class="dropdown-menu main-menu shadow">
                                        @forelse ($category as $cat)
                                            <li><a class="nav-link" href="{{ route('all', $cat->id) }}">{{ $cat->name }} ({{ count($cat->sub_category) }})</a></li>
                                        @empty
                                            <li><a class="nav-link" href="{{ route('all') }}">Sports</a></li>
                                        @endforelse
                                    </ul>
                                </li>
                                @auth()
                                <li class="nav-item dropdown main-navbar">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-auto-close="outside">Open Bets</a>
                                    <ul class="dropdown-menu main-menu shadow">
                                        @forelse ($category as $cat)
                                            <li><a class="nav-link" href="{{ route('open-bets', $cat->id) }}">{{ $cat->name }}</a></li>
                                        @empty
                                            <li><a class="nav-link" href="{{ route('open-bets') }}">Bets</a></li>
                                        @endforelse
                                    </ul>
                                </li>
                                @endauth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about-us') }}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact-us') }}">Contact</a>
                                </li>
                            </ul>
                            @if (Route::has('login'))
                                @auth
                                    <div class="right-area header-action d-flex align-items-center max-un">
                                        <div class="single-item notifications-area">
                                            <div class="notifications-btn active-dot">
                                                <img src="{{ asset('images/icon-notifications.png') }}" alt="icon">
                                                <span class="items">{{ count($_user->unreadNotifications) }}</span>
                                            </div>
                                            <div class="main-area notifications-content">
                                                <div class="head-area d-flex justify-content-between">
                                                    <div class="left d-flex align-items-center">
                                                        <h5>Notifications</h5>
                                                        <span class="mdr">{{ count($_user->unreadNotifications) }}</span>
                                                    </div>
                                                    <button class="clear-all" class="btn-close" data-bs-dismiss="modal">
                                                        <img src="{{asset('images/icon-cancel-btn.png')}}" alt="icon">
                                                    </button>
                                                </div>
                                                <ul>
                                                    @forelse ($_user->unreadNotifications as $notify)
                                                        <li class="border-area">
                                                            <a href="javascript:void(0)">
                                                                <div class="text-area">
                                                                    <h6>{{ $notify->data['subject'] }}</h6>
                                                                    @php $mes = Str::of($notify->data['message'])->words(5, '......') @endphp
                                                                    <p class="mdr">{{ $mes }}</p>
                                                                    <p class="mdr time-area">{{ $notify->created_at->diffForHumans() }}</p>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @empty
                                                        <li class="border-area">
                                                            <a href="javascript:void(0)">
                                                                <div class="text-area">
                                                                    <h6>You don't have any Notification at the moment</h6>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforelse   
                                                    <li class="border-area">
                                                        <a href="{{ route('notifications') }}">
                                                            <img src="{{ asset('images/icon-history-icon.png') }}" alt="icon">
                                                            <p class="mdr">View More Notifications</p>
                                                        </a>
                                                    </li>                                                 
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="single-item user-area">
                                            <div class="user-btn d-flex align-items-center">
                                                <span class="user-profile">
                                                    <img src="{{ asset('images/images-dashboard-profile-1.png') }}" alt="icon">
                                                </span>
                                                <span class="name-area">{{ $_user->name }}</span>
                                                <i class="icon-c-down-arrow"></i>
                                            </div>
                                            <div class="main-area user-content">
                                                <div class="head-area d-flex">
                                                    <div class="img-area">
                                                        <img src="{{ asset('images/images-dashboard-profile-2.png') }}" alt="icon">
                                                    </div>
                                                    <div class="text-area">
                                                        <h5>{{ $_user->name }}</h5>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('images/icon-calendar-icon-2.png') }}" alt="icon">
                                                            <span>Joined {{ $_user->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="border-area">
                                                        <a href="{{ route('dashboard') }}" class="active">
                                                            <img src="{{ asset('images/icon-dashboard-icon.png') }}" alt="icon">
                                                            <p class="mdr">Dashboard</p>
                                                        </a>
                                                    </li>
                                                   
                                                    <li class="border-area">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#logoutMod">
                                                            <img src="{{ asset('images/icon-history-icon.png') }}" alt="icon">
                                                            <p class="mdr">Logout</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="right-area header-action d-flex align-items-center max-un">
                                        <button type="button" class="login" data-bs-toggle="modal" data-bs-target="#loginMod">
                                            Login
                                        </button>
                                        @if (Route::has('register'))
                                            <button type="button" class="cmn-btn reg" data-bs-toggle="modal" data-bs-target="#loginMod">
                                                Sign Up
                                            </button>
                                        @endif
                                    </div>
                                @endauth
                            @endif
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->

    <!-- Login Registration start -->
    <div class="log-reg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal fade" id="loginMod">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <ul class="nav log-reg-btn justify-content-around">
                                    <li class="bottom-area" role="presentation">
                                        <button class="nav-link" id="regArea-tab" data-bs-toggle="tab" data-bs-target="#regArea" type="button" role="tab" aria-controls="regArea" aria-selected="false">
                                            SIGN UP
                                        </button>
                                    </li>
                                    <li class="bottom-area" role="presentation">
                                        <button class="nav-link active" id="loginArea-tab" data-bs-toggle="tab" data-bs-target="#loginArea" type="button" role="tab" aria-controls="loginArea" aria-selected="true">
                                            LOGIN
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="loginArea" role="tabpanel" aria-labelledby="loginArea-tab">
                                        <div class="login-reg-content">
                                            <div class="modal-body">
                                                <div class="head-area">
                                                    <h6 class="title">Login Directly to {{ config('app.name', 'Laravel') }}</h6>
                                                </div>
                                                <div class="form-area">
                                                    <form method="POST" action="{{ route('login') }}">@csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="single-input">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" id="email" placeholder="Email Address" name="email" :value="old('email')" required autofocus autocomplete="email">
                                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                                </div>
                                                                <div class="single-input">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" id="password" placeholder="Email Password" name="password" required autocomplete="current-password" >
                                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="remember-me">
                                                                    <label class="checkbox-single d-flex align-items-center">
                                                                        <span class="left-area">
                                                                            <span class="checkbox-area d-flex">
                                                                                <input type="checkbox" checked name="remember">
                                                                                <span class="checkmark"></span>
                                                                            </span>
                                                                            <span class="item-title d-flex align-items-center">
                                                                                <span>Remember Me</span>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                    @if (Route::has('password.request'))
                                                                        <a href="{{ route('password.request') }}">
                                                                            {{ __('Forgot your password?') }}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <span class="btn-border w-100">
                                                                <button class="cmn-btn w-100" type="submit">LOGIN</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                    <div class="bottom-area text-center">
                                                        <p>Not a member ? <a href="javascript:void(0)" class="reg-btn">Register</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="regArea" role="tabpanel" aria-labelledby="regArea-tab">
                                        <div class="login-reg-content regMode">
                                            <div class="modal-body">
                                                <div class="head-area">
                                                    <h6 class="title">Register On {{ config('app.name', 'Laravel') }}</h6>
                                                </div>
                                                <div class="form-area">
                                                    <form method="POST" action="{{ route('register') }}">@csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="single-input">
                                                                    <label for="name">Full Name</label>
                                                                    <input type="text" id="name" placeholder="Full Name" name="name" :value="old('name')" required  autocomplete="name" autofocus>
                                                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                                </div> 
                                                                <div class="single-input">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" id="email" placeholder="Email Address" name="email" :value="old('email')" required  autocomplete="username">
                                                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                                </div>
                                                                <div class="single-input">
                                                                    <label for="country">Country</label>
                                                                    <select name="country" id="country" required>
                                                                        @forelse ($country as $countries)
                                                                            <option value="{{ $countries->id }}">{{ $countries->name }}</option>
                                                                        @empty
                                                                            <option value="">No Data At Moment</option>
                                                                        @endforelse
                                                                    </select>
                                                                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                                                </div>
                                                                <div class="single-input">
                                                                    <label for="referred">Referral Code<small>(Optional)</small></label>
                                                                    <input type="text" id="referred" placeholder="Referral Code" name="referred" :value="old('referred')">
                                                                    <x-input-error :messages="$errors->get('referred')" class="mt-2" />
                                                                </div>
                                                                <div class="single-input">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" id="password" placeholder="Password" name="password" required  autocomplete="new-password">
                                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                                </div>
                                                                <div class="single-input">
                                                                    <label for="password_confirmation">Confirm Password</label>
                                                                    <input type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required  autocomplete="new-password">
                                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                                </div>
                                                               
                                                            </div>
                                                            <span class="btn-border w-100">
                                                                <button class="cmn-btn w-100" type="submit">SIGN UP</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                    <div class="bottom-area text-center">
                                                        <p>Already have an member ? <a href="javascript:void(0)" class="log-btn">Login</a></p>
                                                    </div>
                                                    <div class="counter-area">
                                                        <div class="single">
                                                            <div class="icon-area">
                                                                <img src="images/icon-signup-counter-icon-1.png" alt="icon">
                                                            </div>
                                                            <div class="text-area">
                                                                <p>25,179k</p>
                                                                <p class="mdr">Bets</p>
                                                            </div>
                                                        </div>
                                                        <div class="single">
                                                            <div class="icon-area">
                                                                <img src="images/icon-signup-counter-icon-2.png" alt="icon">
                                                            </div>
                                                            <div class="text-area">
                                                                <p>6.65 BTC</p>
                                                                <p class="mdr">Total Won</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Registration end -->

     <!-- Logout  start -->
     <div class="log-reg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modal fade" id="logoutMod">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="login-reg-content">
                                    <div class="modal-body">
                                        <div class="head-area">
                                            <h6 class="title">Logout From {{ config('app.name', 'Laravel') }}</h6>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-12">
                                              <p>You are about to logout from {{ config('app.name', 'Laravel') }}, Do you want to proceed with this action?</p>
                                            </div>
                                            
                                            <span class="btn-border w-50">
                                                <form method="POST" action="{{ route('logout') }}">@csrf
                                                    <button class="cmn-btn w-100" type="submit">LOGOUT</button>
                                                </form>
                                            </span> 
                                            
                                            <span class="btn-border w-50">
                                                <button class="cmn-btn w-100" data-bs-dismiss="modal" >CANCEL</button>
                                            </span>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout  end -->

    {{-- betting modal section --}}
    <div class="betpopmodal">
        <div class="modal fade" id="betpop-up" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-8 col-xl-9 col-lg-11">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 id="title" class="text-center"></h5>
                                    <hr>
                                    <div class="top-item">
                                        <label for="firstTeam" class="cmn-btn firstTeam">
                                            <input type="radio" name="bet_option" value="firstTeam" id="firstTeam" checked>
                                            1
                                        </label>
                                        <span>:</span>
                                        <label for="draw" class="cmn-btn draw">
                                            <input type="radio" name="bet_option" value="draw" id="draw">
                                            X
                                        </label>
                                        <span>:</span>
                                        <label for="lastTeam" class="cmn-btn lastTeam">
                                            <input type="radio" name="bet_option" value="lastTeam" id="lastTeam">
                                            2
                                        </label>
                                    </div>
                                    <div class="mid-area">
                                        <div class="single-area">
                                            <div class="item-title d-flex align-items-center justify-content-between">
                                                <span>Bet Value :</span>
                                            </div>
                                            <div class="d-flex in-dec-val">
                                                <input type="number" value="500" min="500" class="InDeVal1" name="amount">
                                                <div class="btn-area">
                                                    <button class="plus">
                                                        <img src="{{ asset('images/icon-up-arrow.png') }}" alt="icon">
                                                    </button>
                                                    <button class="minus">
                                                        <img src="{{ asset('images/icon-down-arrow.png') }}" alt="icon">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-area quick-amounts">
                                            <div class="item-title d-flex align-items-center">
                                                <p>Quick Amounts</p>
                                            </div>
                                            <div class="input-item">
                                                <button class="quickIn">500</button>
                                                <button class="quickIn">1000</button>
                                                <button class="quickIn">5000</button>
                                                <button class="quickIn">10000</button>
                                                <button class="quickIn">250000</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="categories_id form-control" name="categories" />
                                    <input type="hidden" class="leagues_id form-control" name="leagues" />
                                    <input type="hidden" class="games_id form-control" name="games" />
                                    <input type="hidden" class="game_date form-control" name="game_date" />
                                    @auth()
                                        <input type="hidden" class="users form-control" name="users" value="{{ $_user->id }}" />
                                        <div class="bottom-area">
                                            <div class="fee-area">
                                                <p>Available Wallet Balance : <span class="amount">{{ number_format($_user->getBalance()) }}</span> {{ $_user->currency_rate->symbol}}</p>
                                                <p class="fee">Escrow Fee: <span id="escrow_fee">0</span>%</p>
                                            </div>
                                            <div class="btn-area">
                                                <button type="submit" id="placeBet">Make  Bet</button>
                                            </div>
                                            <div class="bottom-right">
                                                <p>Game Closes:</p>
                                                <p class="date-area"><span id="date"></span></p>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    @include('main.footer')

    @bukScripts
</body>

    @include('sweetalert::alert')

</html>
