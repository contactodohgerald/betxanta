@extends('admin.layout')

@section('content')
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">{{ strtoupper($status) }} GAMES LIST</h6>
                <a href="{{ route('select-league') }}">Create New Game</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">S / N</th>
                            <th scope="col">League</th>
                            <th scope="col">Date</th>
                            <th scope="col">Opponent A</th>
                            <th scope="col">Opponent B</th>
                            <th scope="col">Status</th>
                            <th scope="col">End</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @forelse ($games as $game)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $game->league->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($game->game_date)->toRfc850String() }}</td>
                                <td>{{ $game->frst_team->name }}</td>
                                <td>{{ $game->second_team->name }}</td>
                                <td>{{ $game->game_status }}</td>
                                <td>
                                    <button {{ $status == 'completed'?'disabled':'' }} data-toggle="modal" data-target="#endGame{{ $game->id }}" class="btn btn-sm"><i class="fa fa-pen"></i></button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <x-modals name="endGame{{ $game->id }}" title="End Game">
                                <form action="{{ route('end-game') }}" method="POST">@csrf @method('PATCH')
                                    <div class="modal-body">
                                        <div>
                                            <h4 class="text-center">{{ $game->frst_team->name }} <small>Vs</small> {{ $game->second_team->name }}</h4>
                                        </div>
                                        <input type="hidden" value="{{ $game->id }}" name="game_id">
                                        <div class="form-group">
                                            <x-input-label for="winners" :value="__('Winner')" />
                                            <select name="winners" class="form-control bg-dark" required id="winners">
                                                <option value="first_team">{{ $game->frst_team->name }} Won</option>
                                                <option value="draw">Draw</option>
                                                <option value="last_team">{{ $game->second_team->name }} Won</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <x-input-label for="score" :value="__('Game Score (2:0, 0:2, 2:2)')" />
                                            <x-text-input id="score" class="form-control mt-1 w-full" type="text" name="score" placeholder="Game Score (2:0, 0:2, 2:2)" required />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">End Game</button>
                                    </div>
                                </form>
                            </x-modals>
                        @empty
                            <tr><td colspan="11" class="text-center">No games data avaliable at the moment</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    {{ $games->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection