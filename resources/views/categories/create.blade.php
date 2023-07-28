@extends('layout')

@section('content')

<div class="container">
    <div class="">
        <div class="card">
            <div class="p-2">
                <h4>Lists of all the categories</h4>
                @foreach ($categories as $category)
                    <a class="btn btn-sm mb-1 btn-outline-dark">{{ $category->name }}</a> |
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf
    
                <div class="form-group mt-2">
                    <label>Categories</label>
                    <input name="name" type="text" class="form-control" placeholder="Drinks" 
                    value="{{ old('name', $category->name ?? null) }}" required>    
                </div>

                <div class="form-group">
                    <label class="mt-2">(Not Required) Add Images </label>
                    <div class="form-group-card">
                        <div class="p-2">
                            <input type="file" name="thumbnail" class="form-control-file">
                        </div>
                    </div>    
                </div>
    
                <button type="submit" class="mt-2 btn btn-sm w-100 btn-outline-dark">Create !</button>
            </form>
        </div>
    
    </div>
</div>



@endsection