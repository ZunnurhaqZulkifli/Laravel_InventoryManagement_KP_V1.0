@extends('layout')

@section('content')

<div class="container">
    <div class="card">
        <div class="row p-3 mb-2">
        <div class="display-2 text-center mb-2">All The Brands</div>
            @foreach ($categories as $category)
                <div class="card text-center mb-1">
                    <div class="card-body">
                        <div class="display-6 mb-2">{{ $category->name }}</div>
                        @foreach ($category->brands as $brand)
                            <a class="btn btn-sm col-2 btn-outline-dark mb-2" href="{{ route('brands.show', [$brand->id]) }}">{{ $brand->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="p-3">
            <a class="btn btn-sm w-100 btn-outline-dark" href="{{ route('brands.create') }}">Add a Brand</a>
        </div>
    </div>
</div>

@endsection