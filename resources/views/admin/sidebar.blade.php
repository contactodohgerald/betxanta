 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ url('/') }}" target="_blank" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>{{ config('app.name', 'Laravel') }}</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset(auth()->user()->photo_url )}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                <span>{{ auth()->user()->type }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin-dashboard') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('view-categories') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Categories</a>
            <a href="{{ route('create-league') }}" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Create Leagues</a>
            <a href="{{ route('view-teams') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Create Teams</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Game Section</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('select-league') }}" class="dropdown-item">Create Game</a>
                    <a href="{{ route('view-games', 'ongoing') }}" class="dropdown-item">View Ongoing Games</a>
                    <a href="{{ route('view-games', 'completed') }}" class="dropdown-item">View Completed Games</a>
                </div>
            </div>
            <a href="{{ route('withdraw-request') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Withdrawals</a>
            <a href="{{ route('transactions') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Transactions</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Bets</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('bets-history', 'ongoing') }}" class="dropdown-item">Opened Bets</a>
                    <a href="{{ route('bets-history', 'completed') }}" class="dropdown-item">Bet Histories</a>
                </div>
            </div>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#profile" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Profile</a>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#logout" class="nav-item nav-link"><i class="fa fa-trash me-2"></i>Logout</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->