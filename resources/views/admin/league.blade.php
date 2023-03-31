@extends('admin.layout')

@section('content')
     <!-- Form Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Create New League</h6>
                    <form action="{{ route('create-league') }}" method="POST" class="row" enctype="multipart/form-data">@csrf
                        <div class="form-floating mb-3 col-sm-12 col-xl-6">
                            <input type="text" class="form-control" id="subcat_name" name="subcat_name" placeholder="Subcategory Name" required>
                            <label for="subcat_name">League Name</label>
                        </div>
                        <div class="mb-3 col-sm-12 col-xl-6">
                            <input class="form-control form-control-lg  bg-dark" type="file" id="subcat_logo" name="subcat_logo">
                            <label for="subcat_logo" class="form-label">League Logo</label>
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
                            <select class="form-select" id="country" name="country" aria-label="Category" required>
                                @forelse ($country as $countries)
                                 <option value="{{ $countries->id }}">{{ $countries->name }}</option>
                                @empty
                                 <option value="">No Data Returned</option>
                                @endforelse
                             </select>
                            <label for="country">Country</label>
                        </div>
                        <div class="col-sm-12 col-xl-6">
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
                    <h6 class="mb-4">Leagues List</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S / N</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Country</th>
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
                                @forelse ($subcategory as $subcategories)
                                    <tr>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>{{ $subcategories->category->name }}</td>
                                        <td>{{ $subcategories->country->name }}</td>
                                        <td>{{ $subcategories->name }}</td>
                                        <td>
                                            <img class="rounded-circle flex-shrink-0" src="{{ asset($subcategories->subcat_logo) }}" alt="{{ $subcategories->name }}" style="width: 40px; height: 40px;">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-{{ ($subcategories->status == true)?'success':'danger' }} rounded-pill m-2">{{ ($subcategories->status == true)?'Active':'Not Active'}}</button>
                                        </td>
                                        <td>{{ $subcategories->created_at->diffForHumans() }}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#editSubCat{{ $subcategories->id }}" class="btn btn-sm"><i class="fa fa-pen"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <x-modals name="editSubCat{{ $subcategories->id }}" title="Edit League">
                                        <form action="{{ route('update-league' , $subcategories->id) }}" method="POST" enctype="multipart/form-data">@csrf @method('PATCH')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <x-input-label for="subcat_name" :value="__('League Name')" />
                                                    <x-text-input id="subcat_name" class="form-control mt-1 w-full" type="text" name="subcat_name" value="{{ $subcategories->name  }}" required />
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label for="subcat_logo" :value="__('League Logo')" />
                                                    <x-text-input class="form-control mt-1 w-full bg-dark" type="file" name="subcat_logo" id="subcat_logo" />
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label for="category" :value="__('Category')" />
                                                    <select name="category" class="form-control bg-dark" required id="category">
                                                        @forelse ($category as $categories)
                                                            <option {{ ($categories->id == $subcategories->category_id)?'selected':'' }} value="{{ $categories->id }}">{{ $categories->name }}</option>
                                                       @empty
                                                            <option value="">No Data Returned</option>
                                                       @endforelse
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <x-input-label for="country" :value="__('Country')" />
                                                    <select name="country" class="form-control bg-dark" required id="country">
                                                        @forelse ($country as $countries)
                                                            <option {{ ($countries->id == $subcategories->country_id)?'selected':'' }} value="{{ $countries->id }}">{{ $countries->name }}</option>
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
                            {{ $subcategory->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
    

@endsection