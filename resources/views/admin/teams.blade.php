@extends('admin.layout')

@section('content')
     <!-- Form Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-10 offset-xl-1" >
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Create New Team</h6>
                    <form action="{{ route('create-team') }}" method="POST" class="row" enctype="multipart/form-data">@csrf
                        <div class="form-floating mb-3 col-sm-12 col-xl-4">
                            <input type="text" class="form-control" id="opponent_name" name="opponent_name" placeholder="Team Name" required>
                            <label for="opponent_name">Team Name</label>
                        </div>  
                        <div class="form-floating mb-3 col-sm-12 col-xl-4">
                            <input type="text" class="form-control" id="symbol" name="symbol" placeholder="Symbol">
                            <label for="symbol">Symbol</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-4">
                            <input class="form-control bg-dark" type="file" id="logo" name="logo">
                            <label for="logo">Logo</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <select class="form-select" id="category" name="category" aria-label="Category" required>
                               @forelse ($category as $categories)
                                <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                               @empty
                                <option value="">No Data Returned</option>
                               @endforelse
                            </select>
                            <label for="category">Category</label>
                        </div>
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <select class="form-select" id="leagues" name="leagues" aria-label="League" required>
                               @forelse ($leagues as $league)
                                <option value="{{ $league->id }}">{{ $league->name }}</option>
                               @empty
                                <option value="">No Data Returned</option>
                               @endforelse
                            </select>
                            <label for="leagues">Leagues</label>
                        </div>
                        <div class="col-sm-12 col-xl-12">
                            <button class="btn btn-outline-primary w-100 m-2" type="submit">Proceed With Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Different Teams List</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S / N</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">League</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp
                                @forelse ($teams as $team)
                                    <tr>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>{{ $team->category->name }}</td>
                                        <td>{{ $team->league->name }}</td>
                                        <td>{{ $team->name }} ({{ $team->symbol }})</td>
                                        <td>
                                            <img class="rounded-circle flex-shrink-0" src="{{ asset($team->logo) }}" alt="{{ $team->name }}" style="width: 40px; height: 40px;">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-{{ ($team->status == true)?'success':'danger' }} rounded-pill m-2">{{ ($team->status == true)?'Active':'Not Active'}}</button>
                                        </td>
                                        <td>{{ $team->created_at->diffForHumans() }}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#editTeam{{ $team->id }}" class="btn btn-sm"><i class="fa fa-pen"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <x-modals name="editTeam{{ $team->id }}" title="Edit Oponent">
                                        <form action="{{ route('update-team', $team->id) }}" method="POST" enctype="multipart/form-data">@csrf @method('PATCH')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <x-input-label for="opponent_name" :value="__('Team Name')" />
                                                    <x-text-input id="opponent_name" class="form-control mt-1 w-full" type="text" name="opponent_name" value="{{ $team->name  }}" required />
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label for="symbol" :value="__('Symbol')" />
                                                    <x-text-input id="symbol" class="form-control mt-1 w-full" type="text" name="symbol" value="{{ $team->symbol  }}" required />
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label for="logo" :value="__('Logo')" />
                                                    <x-text-input class="form-control mt-1 w-full bg-dark" type="file" name="logo" id="logo" />
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label for="category" :value="__('Category')" />
                                                    <select name="category" class="form-control bg-dark" required id="category">
                                                        @forelse ($category as $categories)
                                                            <option {{ ($categories->id == $team->category_id)?'selected':'' }} value="{{ $categories->id }}">{{ $categories->name }}</option>
                                                        @empty
                                                            <option value="">No Data Returned</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label for="leagues" :value="__('Leagues')" />
                                                    <select name="leagues" class="form-control bg-dark" required id="leagues">
                                                        @forelse ($leagues as $league)
                                                            <option {{ ($league->id == $team->league_id)?'selected':'' }} value="{{ $league->id }}">{{ $league->name }}</option>
                                                        @empty
                                                            <option value="">No Data Returned</option>
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Changes</button>
                                            </div>
                                        </form>
                                    </x-modals>
                                @empty
                                <tr>
                                    <th scope="col-1">No Data Was Returned</th>
                                </tr>
                                @endforelse
                                
                        </table>
                        <div class="btn-group me-2" role="group" aria-label="Second group">
                            {{ $teams->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
    

@endsection