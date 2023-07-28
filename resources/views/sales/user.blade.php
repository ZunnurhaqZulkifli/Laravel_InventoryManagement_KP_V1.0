@extends('layout')


@section('content')

@foreach ($solditems as $item)
    <a href="" class="">Invoice_ID = {{ $item->id}}</a>
    <br>
@endforeach

@endsection