@extends('layout')

@section('content')
    <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Image Name</label>
            <input type="text" name="name" value="{{ old('name', $galleries->name ?? null) }}" required>
        </div>

        <div class="form-group">
            <label class="mt-2">Add Images - </label>
            <div class="form-group-card">
                <div class="p-2">
                    <input type="file" name="thumbnail" class="form-control-file" required>
                </div>
            </div>    
        </div>
        
        <button class="btn btn-sm w-100 btn-outline-dark mt-4" type="submit">Add New Photo</button>
    </form>
@endsection