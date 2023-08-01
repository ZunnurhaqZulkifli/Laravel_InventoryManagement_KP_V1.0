@extends('layout')

@section('content')
    <div class="container">
        <div class="display-2">Product's Stats</div>
        <hr>
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="mt-2 h4 text-center">Product Prices</div>

                    <div class="p-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Variation</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @forelse ($products as $product)
                                    @if ($product != null)
                                        <tr>
                                            <th scope="row">{{ $key++ }}</th>
                                            <td href="" class="">{{ $product->name }}</td>
                                            <td href="" class="">{{ $product->variation->name }}</td>
                                            <td href="" class="">{{ $product->brand->name }}</td>
                                            <td href="" class="">{{ $product->price }}</td>
                                            @if ($product->quantity < 3)
                                                <td href="" class="ps-3 bg-danger text-light">
                                                    {{ $product->quantity }}</td>
                                            @else
                                                <td href="" class="ps-3">{{ $product->quantity }}</td>
                                            @endif
                                            
                                            @can('update', $product)
                                            <td><a href="{{ route('products.edit', [$product->id]) }}"
                                                    class="btn btn-sm badge bg-danger rounded-pill">Edit</a></td>
                                                @else
                                                <td><a onclick="return confirm('Get Admin!')"
                                                    class="btn btn-sm badge bg-danger rounded-pill">Get Admin</a></td>
                                            @endcan('update')
                                        </tr>
                                    @else
                                    @endif
                                @empty
                                    <tr>
                                        <a class="btn btn-sm badge bg-primary w-100 rounded-pill">Add a product</a>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-3 text-center">
                <div class="card">
                    <div class="fs-4 fw-bold">Best Selling<h6> - by price</h6>
                    </div>
                    <div class="p-2 mb-2">
                        @foreach ($hotitems as $hotitem)
                            <a class="btn btn-sm w-100 btn-outline-dark mb-2"
                                href="{{ route('brands.show', [$hotitem->brand->id]) }}">{{ $hotitem->name }}</a>
                            <br>
                        @endforeach
                    </div>
                </div>

                <hr>
            </div>
        </div>
    @endsection
