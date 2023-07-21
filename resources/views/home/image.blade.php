@extends('layout')

@section('content')

<div class="container">
    <form method="POST" action="{{ route('home.image.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-control">
            <label>Add Images</label>
            <input type="file">
        </div>
        <button type="submit">SUBMIT</button>
</div>


@endsection