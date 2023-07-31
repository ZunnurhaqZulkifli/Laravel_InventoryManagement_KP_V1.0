@extends('layout')

@section('content')
    <div class="display-4 fw-bold">Products by Category</div>
    <hr>
    <div class="mt-4">
        @foreach ($categories as $category)
            @if ($category->products->count() != 0)
                <div class="mt-2 mb-4">
                    <div class="card">
                        <div class="p-2">
                            <div class="text-center display-3">{{ $category->name }}</div>
                            <hr>
                            <div class="row row-cols-1 row-cols-md-3 gx-2 gy-2">
                                @foreach ($category->products as $product)
                                    <div class="mt-2 mb-2 card border-warning mx-auto" style="width: 20em">
                                        <div class="card-header bg-white text-center">
                                            <a href="{{ route('products.show', [$product->id]) }}"
                                                class="fw-bold text-center text-dark text-decoration-none">{{ $product->name }}</a>
                                            <br>
                                            <a
                                                class="fw-bold text-center text-dark text-decoration-none">({{ $product->variation->name }})</a>
                                        </div>

                                            <div class="card-body">
                                                @if ($product->image)
                                                    <div class="mt-2 card mx-auto">
                                                        <img class="img-fluid object-fit-contain"
                                                            style="width:300px; height:250px;"
                                                            src="{{ $product->image->url() }}">
                                                    </div>
                                                @else
                                                    <div class="mt-2 card mx-auto justify-content-center align-items-center"
                                                        style="width:250px; height:250px;">
                                                        <a class=""
                                                            href="{{ route('products.edit', [$product->id]) }}">Add
                                                            Images</a>
                                                    </div>
                                                @endif
    
                                            </div>

                                        <div class="card-footer bg-white text-center">
                                            <div class="d-inline">
                                                <a class="text-dark text-decoration-none fw-bold h4">RM
                                                    {{ $product->price }}</a>
                                                <br>

                                                <a href="{{ route('products.show', $product->id) }}"
                                                    class="text-decoration-none badge col-6 bg-danger rounded-pill">Show
                                                </a>

                                                @if ($product->quantity > 0)
                                                    <a href="{{ route('addproducts.to.cart', $product->id) }}"
                                                        class="text-decoration-none badge col-6 bg-success rounded-pill"><i
                                                            class="fa-solid fa-cart-plus" style="color: #ffffff;"></i></a>
                                                @else
                                                    <a href="{{ route('addproducts.to.cart', $product->id) }}"
                                                        class="text-decoration-none badge col-6 bg-danger rounded-pill"><i
                                                            class="fa-solid fa-cart-plus" style="color: #ffffff;"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endif
        @endforeach

        <hr>

        <div class="mb-4">
            <a class="w-100 btn btn-sm btn-outline-dark" href="{{ route('products.create') }}">Add New Product</a>
        </div>
    @endsection
