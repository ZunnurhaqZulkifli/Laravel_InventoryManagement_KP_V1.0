@extends('layout')


@section('content')

    <div class="display-2">Add a product</div>
    <hr>

    <div class="card">
        <div class="p-3">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

                @csrf
                    <div class="form-group">
                        <label>Product's Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Bundaberg (RootBeer)" value="{{ old('name' , $product->name ?? null) }}" required>
                    </div>
                
                    <div class="form-group mt-2">
                        <label>Product's Price</label>
                        <input name="price" type="float" class="form-control" placeholder="7.50" value="{{ old('price', $product->price ?? null) }}" required>
                    </div>

                    <div class="form-group mt-2">
                        <label>Product's Description</label>
                        <input name="description" type="text" class="form-control" placeholder="Air Mineral" value="{{ old('description', $product->description ?? null) }}">
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
                        <label for="brand_id">Brands</label>
                        <select class="form-control" name="brand_id" id="brand">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>

                        <div class="form-group mt-2">
                            <label for="variation_id">Variations</label>
                            <select class="form-control" name="variation_id" id="variation">
                                @foreach($variations as $variation)
                                    <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                                @endforeach
                            </select>

                            <label class="mt-2">Add Images - </label>
                            <div class="form-group card">
                                <div class="p-2">
                                    <input type="file" name="thumbnail" class="form-control-file">    
                                </div>
                            </div>

                            <label class="mt-2">Quantity</label>
                            <div class="form-group-card">
                                <div class="p-2">
                                    <input type="number" name="quantity" class="form-control" placeholder="1" value="{{ old('quantity', $product->quantity ?? 1) }}">
                                </div>
                            </div>
                    </div>

                <button type="submit" class="mt-4 btn btn-sm col-12 btn-outline-primary">Add Items</button>
            </form>
        </div>
    </div>
</div>

<div class="card bg-shadow-sm mt-4 mb-4">
    <div class="row">
        <div class="text-center">
            <div class="col-12 mt-2 mb-2">
                <div>If There is no brands</div>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('brands.create') }}" >Add a Brand</a>

                <a class="btn btn-sm btn-outline-primary" href="{{ route('variations.create') }}" >Add a Variation</a>

                <a class="btn btn-sm btn-outline-primary" href="{{ route('categories.create') }}" >Add a Category</a>
            </div>
        </div>
    </div>
</div>


@endsection('content')