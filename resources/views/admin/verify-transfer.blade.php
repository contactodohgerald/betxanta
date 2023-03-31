<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('admin.head')
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="{{ route('withdraw-request') }}" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>{{ env('APP_NAME') }}</h3>
                            </a>
                            <h3>Verify OTP</h3>
                        </div>
                        <form action="{{ route('verify-otp') }}" method="POST">@csrf
                            <input type="hidden" name="transfer_code" value="{{ session()->get('transfer_code') }}">
                            <input type="hidden" name="reference" value="{{ session()->get('reference') }}">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" required>
                                <label for="otp">Enter OTP</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Verify OTP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    @include('admin.e_script')
    
</body>

</html>