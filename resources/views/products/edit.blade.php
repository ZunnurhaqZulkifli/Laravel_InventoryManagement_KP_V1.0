@extends('layout')

@section('content')
    <div class="p-4">
        <div class="card mt-4">
            <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Are You Sure Delete This Product ?')" value="Delete"
                    class="btn-close position-absolute opacity-100 bg-danger rounded-circle top-0 start-100 translate-middle"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </form>

            <form class="form-group p-3" action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="form-group">
                    <label>Product's Name</label>
                    <input name="name" type="text" class="form-control" placeholder="{{ $product->name }}"
                        value="{{ old('name', $product->name ?? null) }}" required>
                </div>

                <div class="form-group mt-2">
                    <label>Product's Price</label>
                    <input name="price" type="float" class="form-control" placeholder="{{ $product->price }}"
                        value="{{ old('price', $product->price ?? null) }}" required>
                </div>

                <div class="form-group mt-2">
                    <label for="category_id">Category : "{{ $product->category->name }}"</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option aria-placeholder="{{ $product->category->name }}" value="{{ $product->category->id }}">
                            {{ $product->category->name }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="brand_id">Current Brand : "{{ $product->brand->name }}"</label>
                    <select class="form-control" name="brand_id" id="brand_id">
                        <option aria-placeholder="{{ $product->brand->name }}" value="{{ $product->brand->id }}">
                            {{ $product->brand->name }}</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="variation_id">Current Variation : "{{ $product->variation->name }}"</label>
                    <select class="form-control" name="variation_id" id="variation_id">
                        <option aria-placeholder="{{ $product->variation->name }}" value="{{ $product->variation->id }}">
                            {{ $product->variation->name }}</option>
                        @foreach ($variations as $variation)
                            <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                        @endforeach
                    </select>
                </div>

                <label class="mt-2">Add Images - </label>
                <div class="form-group card">
                    <div class="p-2">
                        <input type="file" name="thumbnail" class="form-control-file">
                    </div>
                </div>

                <label class="mt-2">Quantity</label>
                <div class="form-group-card">
                    <div class="p-2">
                        <input type="number" name="quantity" class="form-control" placeholder="1"
                            value="{{ old('quantity', $product->quantity ?? 1) }}">
                    </div>
                </div>

                <button type="submit" class="mt-4 btn btn-sm col-12 btn-outline-primary">Save Item</button>

            </form>
        </div>
    </div>
@endsection
