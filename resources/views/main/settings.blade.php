<div class="setting-tab">
    <div class="row">
        <div class="col-lg-12">
            <div class="single-area">
                <h5>Settings</h5>
            </div>
            <div class="single-area">
                <div class="file-upload">
                    <div class="img-area">
                        <img src="{{ asset($_user->photo_url) }}" alt="{{ $_user->name }}" height="80" width="80">
                    </div>
                    <div class="right-area">
                        <p class="title">Upload profile photo via:</p>
                        <form action="{{ route('update-profile-photo') }}" method="POST" enctype="multipart/form-data">@csrf
                            <label class="file" for="passport">
                                <input type="file" name="passport" id="passport" required>
                                <span class="file-custom"></span>
                            </label>
                            <p class="mdr">Choose a photo from your personal computer. 3MB max.</p>
                            <button type="submit" class="cmn-btn">Upload Verification</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="single-area">
                <div class="icon-area">
                    <img src="{{ asset('images/icon-earned-referral-icon-2.png') }}" alt="icon">
                </div>
                <button class="cmn-btn" data-bs-toggle="modal" data-bs-target="#edit-profile">Update Profile</button>
            </div>
            <div class="single-area">
                <div class="icon-area">
                    <img src="{{ asset('images/icon-message-icon.png') }}" alt="icon">
                </div>
                <button class="cmn-btn" data-bs-toggle="modal" data-bs-target="#change-password">Change Password</button>
            </div>
            <div class="single-area">
                <div class="icon-area">
                    <img src="{{ asset('images/icon-message-icon.png') }}" alt="icon">
                </div>
                <button class="cmn-btn" data-bs-toggle="modal" data-bs-target="#acct-details-up">Update / Add Bank Details</button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-area">
                        <div class="head-area d-flex justify-content-between align-items-center">
                            <h5>My Bank Details</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">S / N</th>
                                        <th scope="col">Bank Name</th>
                                        <th scope="col">Account Name</th>
                                        <th scope="col">Account Number</th>
                                        <th scope="col">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @forelse ($user_accounts as $user_account)
                                        <tr>
                                        $counter = 1;
                                            <th scope="row">{{ $counter++ }}</th>
                                            <td>{{ $user_account->bank_name }}</td>
                                            <td>{{ $user_account->acct_name }}</td>
                                            <td>{{ $user_account->acct_number }}</td>
                                            <td>{{ $user_account->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="10">No Data Avaliable At The Moment</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

 {{-- change password modal section --}}
 <div class="betpopmodal">
    <div class="modal fade" id="change-password" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-8 col-xl-9 col-lg-11">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="setting-personal-details login-password">
                                    <h5>Change Login Password</h5>
                                    <form action="{{ route('update-password') }}" method="POST">@csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label for="current_password">Current Password</label>
                                                    <input type="password" id="current_password" name="current_password" placeholder="Enter Current Password" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label for="password">New Password</label>
                                                    <input type="password" id="password" name="password" placeholder="Enter Password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <span class="btn-border">
                                                    <button class="cmn-btn" type="submit">Proceed</button>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 {{-- edit user profile modal section --}}
 <div class="betpopmodal">
    <div class="modal fade" id="edit-profile" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-8 col-xl-9 col-lg-11">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="setting-personal-details">
                                    <h5>Update Personal Details</h5>
                                    <form action="{{ route('profile-update') }}" method="POST">@csrf @method('PATCH')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" id="name" name="name" value="{{ $_user->name }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" name="email" value="{{ $_user->email }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label for="address">Address</label>
                                                    <input type="text" id="address" name="address" value="{{ $_user->address }}"  placeholder="Enter Address">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label for="country">Select Country</label>
                                                    <select name="country" id="country" required>
                                                        @forelse ($country as $countries)
                                                            <option {{ ($_user->country_id == $countries->id)?'selected':'' }} value="{{ $countries->id }}">{{ $countries->name }}</option>
                                                        @empty
                                                            <option value="">No Data At Moment</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label for="preferred_cur">Select Preferred Currency</label>
                                                    <select name="preferred_cur" id="preferred_cur" required>
                                                        @forelse ($currency as $currencies)
                                                            <option {{ ($_user->preferred_cur == $currencies->id)?'selected':'' }} value="{{ $currencies->id }}">{{ $currencies->symbol }}</option>
                                                        @empty
                                                            <option value="">No Data At Moment</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <span class="btn-border">
                                                    <button class="cmn-btn">Proceed</button>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Update User Account Details start -->
<div class="log-reg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="modal fade" id="acct-details-up">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header justify-content-center">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="tab-content">
                                <div class="login-reg-content">
                                    <div class="modal-body">
                                        <div class="head-area">
                                            <h6 class="title">Verify Bank Number</h6>
                                        </div>
                                        <div class="form-area">
                                            <form method="POST" action="{{ route('verify-bank-number') }}">@csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="single-input">
                                                            <label for="bank-code">Select Bank</label>
                                                            <select name="bank_code" id="bank-code" required>
                                                                @forelse ($banks as $bank)
                                                                    <option value="{{ $bank->code }}">{{ $bank->name }}</option>
                                                                @empty
                                                                    <option value="">No Data At Moment</option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="acct-no">Bank Account Number</label>
                                                            <input type="number" id="acct-no" name="acct_no" placeholder="Bank Account Number" required >
                                                        </div>
                                                    </div>
                                                    <span class="btn-border w-100">
                                                        <button class="cmn-btn w-100" type="submit">Verify Account</button>
                                                    </span>
                                                </div>
                                            </form>
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
<!-- Update User Account Details end -->