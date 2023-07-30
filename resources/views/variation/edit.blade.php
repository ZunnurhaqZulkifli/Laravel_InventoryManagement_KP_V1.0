@extends('layout')

@section('content')
    <div class="container">
        
        <a href="{{ route('variation.all') }}" class="btn btn-sm btn-outline-dark w-100">All The Variations</a>

        <hr>

        <div class="card">
            <form method="POST" action="{{ route('variation.destroy', ['variation' => $variation->id]) }}">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Are You Sure Delete This Variation ?')" value="Delete"
                    class="btn-close position-absolute opacity-100 bg-danger 
            rounded-circle top-0 start-100 translate-middle"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </form>

            <div class="p-3">
                <form class="form-group" action="{{ route('variation.update', ['variation' => $variation->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label for="form-control">Variation Name</label>
                        <input name="name" type="text" class="form-control" placeholder="{{ $variation->name }}"
                            value="{{ old('name', $variation->name ?? null) }}" required>
                    </div>

                    <label class="mt-2">Add Images - </label>
                    <div class="form-group card">
                        <div class="p-2">
                            <input type="file" name="thumbnail" class="form-control-file">
                        </div>
                    </div>

                    <button class=" mt-2 btn btn-outline-dark btn-sm w-100" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection('content')
