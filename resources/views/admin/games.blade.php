@extends('admin.layout')

@section('content')
      <!-- Widgets Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-8 offset-md-2 col-xl-8 offset-xl-2">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0 text-center">Proceed To Game Creation by selecting preferred League</h4>
                    </div>
                    <hr>
                    @foreach ($categories as $category)
                        <div class="d-flex">
                            <h6>{{ $category->name }} </h6>
                        </div>
                        @forelse ($category->leagues as $league)
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <a href="{{ route('create-games', $league->id) }}">
                                            <p>{{ $league->name }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>        
                        @empty
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                   <h6 class="">No Leagues Avaliable for this Category at this time</h6>
                                </div>
                            </div>        
                        @endforelse                     
                    @endforeach               
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->
@endsection