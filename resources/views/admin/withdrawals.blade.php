@extends('admin.layout')

@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">PENDING WITHDRAWAL REQUESTS</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">S/N</th>
                            <th scope="col">User</th>
                            <th scope="col">Passport</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Acct Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @forelse ($pending_request as $withdrawal)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $withdrawal->users->name }} ({{ $withdrawal->users->email }})</td>
                                <td>
                                    <img src="{{ asset($withdrawal->users->photo_url) }}" alt="{{ $withdrawal->users->name }}" width="50" height="50">
                                </td>
                                <td>{{ $withdrawal->usersAccount->bank_name }} ({{$withdrawal->usersAccount->acct_number}})</td>
                                <td>{{$withdrawal->usersAccount->acct_name}}</td>
                                <td>{{ number_format($_user->toView($withdrawal->amount)) }} <span>{{ $_user->currency_rate->symbol }}</td>
                                <td><span style="color: #f10c0c">{{ $withdrawal->trf_status == 'pending'?"Pending":$withdrawal->trf_status }}</span></td>
                                <td>
                                    <button data-toggle="modal" data-target="#transferFunds{{ $withdrawal->id }}" class="btn btn-sm"><i class="fa fa-edit"></i></button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <x-modals name="transferFunds{{ $withdrawal->id }}" title="Process User Transfer">
                                <form action="{{ route('single-transfer') }}" method="POST">@csrf
                                    <div class="modal-body">
                                        <p>Transfer {{ number_format($_user->toView($withdrawal->amount)) }} {{ $_user->currency_rate->symbol }} to {{$withdrawal->usersAccount->acct_name}},{{ $withdrawal->usersAccount->bank_name }} ({{$withdrawal->usersAccount->acct_number}})</p>
                                       <input type="hidden" value="{{ $withdrawal->id }}" name="withdrawal_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Proceed</button>
                                    </div>
                                </form>
                            </x-modals>
                        @empty
                            <tr><td colspan="11" class="text-center">No games data avaliable at the moment</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    {{ $pending_request->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">WITHDRAWAL REQUESTS HISTORY</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">S/N</th>
                            <th scope="col">User</th>
                            <th scope="col">Passport</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Acct Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @forelse ($completed_request as $withdrawal)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $withdrawal->users->name }} ({{ $withdrawal->users->email }})</td>
                                <td>
                                    <img src="{{ asset($withdrawal->users->photo_url) }}" alt="{{ $withdrawal->users->name }}" width="50" height="50">
                                </td>
                                <td>{{ $withdrawal->usersAccount->bank_name }} ({{$withdrawal->usersAccount->acct_number}})</td>
                                <td>{{$withdrawal->usersAccount->acct_name}}</td>
                                <td>{{ number_format($_user->toView($withdrawal->amount)) }} <span>{{ $_user->currency_rate->symbol }}</td>
                                <td><span style="color: #27f10c">{{ $withdrawal->trf_status == 'completed'?"Completed":$withdrawal->trf_status }}</span></td>
                                <td>
                                    <button data-toggle="modal" data-target="#deleteWithdrawal{{ $withdrawal->id }}" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <x-modals name="deleteWithdrawal{{ $withdrawal->id }}" title="Delete Withdraw Request">
                                <form action="{{ route('delete-withdrawal') }}" method="POST">@csrf
                                    <div class="modal-body">
                                        <p>You are about to proceed with the request of deleting this withdrawal request</p>
                                       <input type="hidden" value="{{ $withdrawal->id }}" name="withdrawal_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Proceed</button>
                                    </div>
                                </form>
                            </x-modals>
                        @empty
                            <tr><td colspan="11" class="text-center">No data avaliable at the moment</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    {{ $completed_request->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection