@extends('layout')

@section('content')
    <div class="container">

        <div class="display-2">Product</div>

        <hr>

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="display-4">{{ $products->brand->name }} <span class="h2">({{ $products->name }})</span>
                    </div>
                    <div class="p-1 display-4 bg-dark border rounded text-white">RM{{ $products->price }}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-3 text-center">
                    <div class="p-2">
                        @if ($products->image)
                            <div class="card">
                                <center class=""><img class="img-fluid object-fit-scale"
                                        style="width:320px; height:250px;" src="{{ $products->image->url() }}"></center>
                            </div>
                        @else
                            @can('update', $products)
                                <div class="card justify-content-center align-items-center" style="width:320px; height:250px;">
                                    <a href="{{ route('products.edit', [$products->id]) }}"
                                        class="justify-content-center align-items-center">Add an Image</a>
                                </div>
                            @else
                                <div class="card justify-content-center align-items-center">
                                    <a onclick="return confirm('Contact Admin!')" class="w-100 btn btn-sm btn-outline-dark">No
                                        Photos</a>
                                </div>
                            @endcan
                        @endif
                    </div>
                </div>

                <div class="col-9">
                    <div class="p-2 justify-content-center">
                        <div class="card">
                            <div class="p-1 h4">
                                <table class="table table-striped border">
                                    <thead>
                                        <tr>
                                            <th scope="col">Type</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Category</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="">{{ $products->variation->name }}</div>
                                            </td>

                                            <td>
                                                <div class="">{{ $products->brand->name }}</div>
                                            </td>

                                            <td>
                                                <div class="">{{ $products->category->name }}</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="card rounded-0">
                                    <div class="p-1">
                                        <div class="">Liked by : {{ $products->on_pressed }}</div>
                                        @if ($products->quantity != null)
                                            <div class="">Stock Left : {{ $products->quantity }}</div>
                                        @else
                                            <div class="">Stock Left : 0</div>
                                        @endif
                                    </div>
                                </div>

                                <hr class="mb-2">
                                <div class="d-flex mb-0">

                                    @can('update', $products)
                                        <a href="{{ route('products.edit', [$products->id]) }}"
                                            class="btn btn-outline-primary w-100 btn-sm">Edit</a>

                                        <div class="ps-1"></div>
                                        <a class="btn btn-outline-success w-75 btn-sm"
                                            href="{{ route('addproducts.to.cart', [$products->id]) }}">Add To Cart</a>
                                    @else
                                        <a class="btn btn-outline-success w-100 btn-sm"
                                            href="{{ route('addproducts.to.cart', [$products->id]) }}">Add To Cart</a>
                                    @endcan('update')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
