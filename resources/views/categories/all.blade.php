@extends('layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="display-6 text-center">All The Categories</div>
            </div>

            <div class="card-body">
                <div class="p-2 text-center">
                    @foreach ($categories as $category)
                        <a href="{{ route('categories.edit',[$category->id]) }}" class="rounded-0 mb-2 col-2 btn btn-sm btn-outline-dark">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
