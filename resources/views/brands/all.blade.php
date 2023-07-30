@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="display-6 text-center">All The Brands</div>
            </div>

            <div class="card-body">
                <div class="p-2 text-center">
                    @foreach ($brands as $brand)
                        <a href="{{ route('brands.edit',[$brand->id]) }}" class="rounded-0 mb-2 col-2 btn btn-sm btn-outline-dark">{{ $brand->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
