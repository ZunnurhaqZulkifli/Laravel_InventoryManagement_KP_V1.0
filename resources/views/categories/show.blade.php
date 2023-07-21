@extends('layout')


@section('content')

<a class="p-2 btn btn-sm btn-outline-dark" href="{{ url()->previous() }}">Go Back</a>

<div class="container">
    
    <div class="display-2 text-center mb-4"></div>
        <div class="card text-center">
            <div class="card-header">
                <div class="display-2 mb-4">{{ $category->name }}</div>
            </div>
        <div class="p-4">
            @foreach($category->brands as $brand)
                <a class="btn btn-sm col-2 btn-outline-dark mb-2" href="{{ route('brands.show', [$brand->id]) }}">{{ $brand->name }}</a>
            @endforeach
        </div>
    </div>
</div>

@endsection
