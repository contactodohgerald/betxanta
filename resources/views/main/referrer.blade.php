<div class="affiliate-tab">
    <div class="row">
        <div class="col-12">
            <h5>Affiliate Program</h5>
            <p>Get a lifetime bonus / reward of up to {{ env('REFERRER_PERCENT') }}% for inviting new people! to {{ env('APP_NAME') }} each time a bet is placed</p>
            <div class="row">
                <div class="col-xl-6">
                    <div class="single-info">
                        <img src="{{ asset('images/icon-earned-referral-icon-1.png') }}" alt="icon">
                        <div class="text-area">
                            <h4>{{ number_format($_user->toView($_user->ref_bal)) }} <span>{{ $_user->currency_rate->symbol }}</h4>
                            <p class="mdr">Referral Balance</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="single-info">
                        <img src="{{ asset('images/icon-earned-referral-icon-2.png') }}" alt="icon">
                        <div class="text-area">
                            <h4>{{ count($referrals) }}</h4>
                            <p class="mdr">Total Referrals</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="referral-bar">
                <p>My Referral Link</p>
                <div class="input-area"> 
                    <input type="text" value="{{ $_user->referral }}" name="refCode" readonly>
                    <img src="{{ asset('images/icon-copy-icon.png') }}" alt="icon" id="copyRefCode">
                </div>
            </div>
            <div class="table-area">
                <div class="head-area d-flex justify-content-between align-items-center">
                    <h5>Referral History</h5>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Country</th>
                                <th scope="col">Passport</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @forelse ($referrals as $referral)
                                <tr>
                                    <th scope="row">{{ $counter++ }}</th>
                                    <td>{{ $referral->name }}</td>
                                    <td>{{ $referral->country == null?'None' : $referral->country->name }}</td>
                                    <td>
                                        <img src="{{ asset($referral->photo_url) }}" alt="{{ $referral->name }}" height="80" width="80">
                                    </td>
                                    <th scope="row">{{ $referral->created_at->diffForHumans() }}</th>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="10">No Data Was Returned</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center mt-60">
                    <nav aria-label="Page navigation" class="d-flex justify-content-center">
                        <ul class="pagination justify-content-center align-items-center">
                            <li class="page-item">
                                <a class="page-btn previous" href="{{ $referrals->previousPageUrl() }}" aria-label="Previous">
                                    <img src="{{ asset('images/icon-arrow-left.png') }}" alt="icon">
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link xlr active" href="javascript:void(0)">{{ $referrals->currentPage() }}</a></li>
                            <li class="page-item">
                                <a class="page-btn next" href="{{ $referrals->nextPageUrl() }}" aria-label="Next">
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