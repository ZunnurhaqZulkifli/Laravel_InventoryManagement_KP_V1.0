@extends('layout')

@section('content')

    <div class="container">

    <div class="display-2">Product</div>
    <hr>

    <div class="card">
        <div class="p-2 display-4">{{ $products->brand->name }} <span class="h2">({{ $products->name }})</span></div>
        <div class="row">
            <div class="col-3">
                <div class="p-2">
                    @if ($products->image)
                        <div class="card">
                            <center class=""><img class="img-fluid object-fit-scale"
                                    style="width:250px; height:248px;" src="{{ $products->image->url() }}"></center>
                        </div>
                    @else
                        <a class="text-center" href="{{ route('products.edit', [$products->id]) }}">Add an Image</a>
                    @endif
                </div>
            </div>

            <div class="col-9">
                <div class="p-2 justify-items-center">
                    <div class="card">
                        <div class="p-2 mb-4">
                            <div class="mb-2">Product Details :</div>
                            <div class="mb-2">Price : RM {{ $products->price }}</div>
                            <div class="mb-2">Type : {{ $products->variation->name }}</div>
                            <div class="mb-2">Brand : {{ $products->brand->name }}</div>

                            @if ($products->quantity != null)
                                <div class="mb-2">Stock Left : {{ $products->quantity }}</div>
                            @else
                                <div class="mb-2">Stock Left : 0</div>
                            @endif
                            <hr class="mb-2">
                            <div class="d-flex mb-0">
                                <a class="btn btn-outline-primary w-100 btn-sm" href="{{ route('products.edit', [$products->id]) }}">Edit</a>
                                <a class="btn btn-outline-success w-75 btn-sm" href="{{ route('addproducts.to.cart', [$products->id]) }}">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
