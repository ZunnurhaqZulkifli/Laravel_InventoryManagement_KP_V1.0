@extends('layout')

@section('content')
    <div class="container">
        
        <a href="{{ route('brands.all') }}" class="btn btn-sm btn-outline-dark w-100">All The Brands</a>

        <hr>

        <div class="card">
            <form method="POST" action="{{ route('brands.destroy', ['brand' => $brand->id]) }}">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Are You Sure Delete This Brand ?')" value="Delete"
                    class="btn-close position-absolute opacity-100 bg-danger 
            rounded-circle top-0 start-100 translate-middle"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </form>

            <div class="p-3">
                <form class="form-group" action="{{ route('brands.update', ['brand' => $brand->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mt-2">
                        <label for="form-control">Brands Name</label>
                        <input name="name" type="text" class="form-control" placeholder="{{ $brand->name }}"
                            value="{{ old('name', $brand->name ?? null) }}" required>
                    </div>

                    <button class=" mt-2 btn btn-outline-dark btn-sm w-100" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection('content')
