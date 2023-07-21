@extends('layout')

@section('content')

<div class="container">
    <div class="card">
            <div class="p-3">
            <div class="card">
                <div class="p-2">
                    <h4>Lists of all the brands</h4>
                    @foreach ($brands as $brand)
                        <a href="{{ route('brands.show', ['brand' => $brand->id]) }}" class="btn btn-sm mb-2 btn-outline-dark">{{ $brand->name }}</a> |
                    @endforeach
                </div>
            </div>

                <form  method="POST" action="{{ route('brands.store') }}" enctype="multipart/from-data">
                    @csrf
                        <div>
                            <div class="h4 mt-3">Add a new brand</div>
                                <input name="name" type="text" class="form-control" placeholder="Coca Cola" value="{{ old('name', $brand->name ?? null) }}" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label for="variation_id">Variations</label>
                            <select class="form-control" name="variation_id" id="variation_id">
                                <option>Default</option>
                                @foreach($variations as $variation)
                                    <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    <button type="submit" class="mt-4 btn btn-sm col-12 btn-outline-primary">Add Brands</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection