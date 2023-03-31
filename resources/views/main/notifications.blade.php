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
                                    <a href="{{ route('dashboard') }}" class="nav-link active" type="button">Go Back</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="affiliate-tab">
                            <div class="row">
                                <div class="col-12">
                                    <h5>All Notifications</h5>
                                    @forelse ($notifications as $notify)
                                        <div class="referral-bar">
                                            <h5>{{ $notify->data['subject'] }}</h5>
                                            <p class="mdr">{{ $notify->data['message'] }}</p>
                                            <p class="mdr">{{ $notify->data['body'] }}</p>
                                            <p class="mdr time-area">{{ $notify->created_at->diffForHumans() }}</p>
                                        </div>
                                    @empty
                                        <div class="referral-bar">
                                            <h6>You don't have any Notification at the moment</h6>
                                        </div>
                                    @endforelse  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Content Section end -->
@endsection