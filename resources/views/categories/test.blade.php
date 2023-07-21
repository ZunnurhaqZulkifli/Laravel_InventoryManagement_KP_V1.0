@extends('layout')

@section('content')


@foreach ($categories as $category)
    <a>{{ $category->id }}</a>
    <a>{{ $category->name }}</a>
    <br>
@endforeach


@endsection('contnet')