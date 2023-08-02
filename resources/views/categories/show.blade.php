@extends('layout')


@section('content')

<div class="container">
    
    <div class="display-2 text-center mb-4"></div>
        <div class="card text-center">
            <div class="card-header">
                <div class="display-2 mb-4">{{ $category->name }}</div>
            </div>
        <div class="p-4">
            @foreach($category->brands as $brand)
                <a class="btn btn-sm rounded-0 col-2 btn-outline-dark mb-2" href="{{ route('brands.show', [$brand->id]) }}">{{ $brand->name }}</a>
            @endforeach
        </div>
    </div>
</div>

@endsection
