@extends('layout')


@section('content')
    <div class="card">
        @foreach ($variations as $variation)
            <a href="" class="fw-bold btn btn-sm">{{ $variation->name }}</a>
        @endforeach
    </div>
@endsection
