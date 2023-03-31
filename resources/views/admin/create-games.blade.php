@extends('admin.layout')

@section('content')
      <!-- Form Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-10 offset-xl-1" >
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Create New Game ({{ strtoupper($league->name) }})</h6>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form action="{{ route('create-game', ) }}" method="POST" class="row">@csrf
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <input type="datetime-local" class="form-control" id="game_date" name="game_date" placeholder="Game Date">
                            <label for="game_date">Game Date</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <select class="form-select" id="country" name="country" aria-label="Game Country" required>
                                <option value="{{ $league->country->id }}">{{ $league->country->name }}</option>
                            </select>
                            <label for="country">Game Country</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <select class="form-select" id="team_a" name="team_a" aria-label="Team | Oppenent A" required>
                               @forelse ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                               @empty
                                <option value="">No Data Returned</option>
                               @endforelse
                            </select>
                            <label for="team_a">Team | Oppenent A</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <select class="form-select" id="team_b" name="team_b" aria-label="Team | Oppenent B" required>
                               @forelse ($teams->reverse() as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                               @empty
                                <option value="">No Data Returned</option>
                               @endforelse
                            </select>
                            <label for="team_b">Team | Oppenent B</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <select class="form-select" id="location_a" name="location_a">
                                <option value="Home">Home</option>
                                <option value="Away">Away</option>
                            </select>
                            <label for="location_a">Game Location (A)</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <select class="form-select" id="location_b" name="location_b">
                                <option value="Away">Away</option>
                                <option value="Home">Home</option>
                            </select>
                            <label for="location_b">Game Location (B)</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <input type="number" class="form-control" id="min_amt" name="min_amt" value="500">
                            <label for="min_amt">Minimiun Amount ({{ auth()->user()->toView(0, 'symbol')}})</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <input type="number" class="form-control" id="escrow_fee" name="escrow_fee" value="5">
                            <label for="escrow_fee">Escrow Fee (%)</label>
                        </div>
                        <input type="hidden" class="form-contol" value="{{ $league->id }}" name="league">
                        <input type="hidden" class="form-contol" value="{{ $league->category_id }}" name="category">
                        <div class="col-sm-12 col-xl-12">
                            <button class="btn btn-outline-primary w-100 m-2" type="submit">Proceed With Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection