@extends('admin.layout')


@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">{{ $option == 'ongoing'?'Open Bets':'Bet History' }}</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">S/N</th>
                            <th scope="col">Game</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Count</th>
                            <th scope="col">Game Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $counter = 1; @endphp
                        @forelse ($bets as $bet)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $bet->games->frst_team->name }} Vs {{ $bet->games->second_team->name }}</td>
                                <td>{{ number_format($_user->toView($bet->bet_amt)) }} <span>{{ $_user->currency_rate->symbol }}</td>
                                <td>
                                    <span>{{ $bet->first_team == ''?'':'✔️' }}</span>
                                    <span>{{ $bet->draw == ''?'':'✔️' }}</span>
                                    <span>{{ $bet->first_team == ''?'':'✔️' }}</span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($bet->game_date)->toRfc850String() }}</td>
                                <td><span style="color: #{{ ($bet->bet_status == 'completed')?'27f10c':'df0a0a'}} ">{{ $bet->bet_status == 'completed'?'Completed':'Pending'}}</span></td>
                                <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                            </tr>
                            <!-- Modal -->
                            <x-modals name="editSubCat{{ $bet->id }}" title="Edit League">
                               
                            </x-modals>
                        @empty
                            <tr>
                                <th scope="col-1">No Data Was Returned</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    {{ $bets->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection