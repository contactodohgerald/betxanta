<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('admin.head')

<body>

    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


       @include('admin.sidebar')


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="{{ route('admin-dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                       
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin ({{ count($_user->unreadNotifications) }})</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            @forelse ($_user->unreadNotifications as $notify)
                                <a href="javascript:void(0)" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">{{ $notify->data['subject'] }}</h6>
                                    <small>{{ $notify->created_at->diffForHumans() }}</small>
                                </a>
                                <hr class="dropdown-divider">
                            @empty
                                <hr class="dropdown-divider">
                                <a href="javascript:void(0)" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">You don't have any Notification at the moment</h6>
                                </a>
                            @endforelse   
                            <hr class="dropdown-divider">
                            <a href="{{ route('notifications') }}" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset(auth()->user()->photo_url )}}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#profile" class="dropdown-item">My Profile</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#profile" class="dropdown-item">Settings</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#logout" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            @yield('content')

            @include('admin.footer')

        </div>
        <!-- Content End -->

        <!-- Modal -->
        <x-modals name="logout" title="Logout From {{ config('app.name', 'Laravel') }}">
            <div class="modal-body">
                <div class="col-12">
                    <p>You are about to logout from {{ config('app.name', 'Laravel') }}, Do you want to proceed with this action?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                <form method="POST" action="{{ route('logout') }}">@csrf
                    <button type="submit" class="btn btn-primary">LOGOUT</button>
                </form>
            </div>  
        </x-modals>

        <!-- Modal -->
        <x-modals name="profile" title="User Profile | Update"> 
            <form method="POST" action="{{ route('profile-update') }}" enctype="multipart/form-data">@csrf @method('PATCH')
                <div class="modal-body row">
                    <div class="mb-3 col-sm-12 col-xl-6">
                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="mb-3 col-sm-12 col-xl-6">
                        <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                    </div>
                    <div class="mb-3 col-sm-12 col-xl-12">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address }}">
                    </div>
                    <div class="mb-3 col-sm-12 col-xl-6">
                        <label for="country">Country</label>
                        <select class="form-select" id="country" name="country" required>
                            @forelse ($country as $countries)
                             <option {{ $countries->id == auth()->user()->country_id?'selected':'' }} value="{{ $countries->id }}">{{ $countries->name }}</option>
                            @empty
                             <option value="">No Data Returned</option>
                            @endforelse
                         </select>
                    </div>
                    <div class="mb-3 col-sm-12 col-xl-6">
                        <label for="preferred_cur">Preferred Currency</label>
                        <select class="form-select" name="preferred_cur" id="preferred_cur" required>
                            @forelse ($currency as $currencies)
                             <option {{ $currencies->id == auth()->user()->preferred_cur?'selected':'' }} value="{{ $currencies->id }}">{{ $currencies->symbol }}</option>
                            @empty
                             <option value="">No Data Returned</option>
                            @endforelse
                         </select>
                    </div>
                    <div class="mb-3 col-sm-12 col-xl-12">
                        <label for="passport">Passport</label>
                        <input type="file" class="form-control bg-dark" id="passport" name="passport">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn btn-primary">PROCEED</button>
                </div>  
            </form>
        </x-modals>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('admin.e_script')

    <!-- Template Javascript -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
</body>

    @include('sweetalert::alert')

</html>