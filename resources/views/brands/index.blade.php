@extends('layout')

@section('content')

<div class="container">
    <div class="card">
        <div class="row p-3 mb-2">
        <div class="display-2 text-center">All The Brands</div>
            @foreach ($categories as $category)
                <div class="card">
                    <div class="card-body">
                        <div class="display-6">{{ $category->name }}</div>
                        @foreach ($category->brands as $brand)
                            <div class="col-2">
                                <a class="btn btn-sm w-100 btn-outline-dark mb-2" href="{{ route('brands.show', [$brand->id]) }}">{{ $brand->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection