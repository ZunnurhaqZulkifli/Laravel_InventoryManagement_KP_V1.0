@extends('layout')

@section('content')

{{-- @foreach ($brands as $brand) --}}
    <div class="display-4">All Products</div>
{{-- @endforeach --}}


<hr>

    <div class="card border-info">
        <div class="row p-2">
            <div class="col-3">
                <p class="fw-bold">Name</p>
                    @foreach ($products as $product)
                        <a class="text-decoration-none" href="{{ route('products.show', [$product->id]) }}">{{ $product->id }} . {{ $product->name }}</a>
                        <br>
                    @endforeach
            </div>

            <div class="col-2">
                <p class="fw-bold">Price</p>
                @foreach ($products as $product)
                    <div>RM {{ $product->price }}</div>
                @endforeach
            </div>
            
            <div class="col-2">
                <p class="fw-bold">Category</p>
                @foreach ($products as $product)
                    <div>{{ $product->category->name }}</div>
                @endforeach
            </div>

            <div class="col-2">
                <p class="fw-bold">Brand</p>
                @foreach ($products as $product )
                    <div>{{ $product->brand->name }}</div>
                @endforeach
            </div>

            <div class="col-2">
                <p class="fw-bold">Variation</p>
                @foreach ($products as $product )
                    <div>{{ $product->variation->name }}</div>
                @endforeach
            </div>
            
        </div>
    </div>

    <a class="mt-2 btn btn-sm btn-outline-primary col-12" href="{{ route('products.create') }}">Add Product</a>

    <div class="card mt-4">
        <div>
            
        </div>
    </div>


@endsection