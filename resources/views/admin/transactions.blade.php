@extends('admin.layout')

@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">TRANSACTIONS HISTORY</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">S/N</th>
                            <th scope="col">User</th>
                            <th scope="col">Passport</th>
                            <th scope="col">Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Mode</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $transaction->users->name }} ({{ $transaction->users->email }})</td>
                                <td>
                                    <img src="{{ asset($transaction->users->photo_url) }}" alt="{{ $transaction->users->name }}" width="50" height="50">
                                </td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ number_format($_user->toView($transaction->amount)) }} <span>{{ $_user->currency_rate->symbol }}</td>
                                <td >{{ $transaction->mode }}</td>
                                <td><span style="color: #{{ $transaction->status?"27f10c":'df0a0a'}} ">{{ $transaction->status?"Completed":'Pending'}}</span></td>
                                <td>
                                    <button data-toggle="modal" data-target="#deleteTransaction{{ $transaction->id }}" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <x-modals name="deleteTransaction{{ $transaction->id }}" title="Delete Transaction">
                                <form action="{{ route('delete-trans') }}" method="POST">@csrf
                                    <div class="modal-body">
                                        <p>You are about to proceed with the request of deleting this transaction</p>
                                       <input type="hidden" value="{{ $transaction->id }}" name="transaction_id">
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
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection