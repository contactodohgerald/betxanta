@extends('admin.layout')

@section('content')
      <!-- Table Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Categories List</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S / N</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Created</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = 1; @endphp
                                @forelse ($category as $categories)
                                    <tr>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>{{ $categories->name }}</td>
                                        <td>
                                            <img class="rounded-circle flex-shrink-0" src="admin/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-{{ ($categories->status == true)?'success':'danger' }} rounded-pill m-2">{{ ($categories->status == true)?'Active':'Not Active'}}</button>
                                        </td>
                                        <td>{{ $categories->created_at->diffForHumans() }}</td>
                                        <td>
                                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <th scope="col">No Data Was Returned</th>
                                </tr>
                                @endforelse
                                
                        </table>
                        <div class="btn-group me-2" role="group" aria-label="Second group">
                            {{ $category->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

@endsection