@extends('layout')

@section('content')
    <div class="container">

        <div class="display-4 mt-4">All Products</div>
        <a onclick="return showQuantity()" id="totalItems"
            class="fw-bold text-decoration-none text-dark badge bg-warning rounded-pill"> TOTAL : {{ $totalQuantity }}</a>

        <script type="text/javascript">
            function showQuantity() {
                var x = document.getElementById("totalItems");
                alert(x.innerText);
            }
        </script>

        <hr>

        <div class="mt-2 mb-4">
            <form class="d-flex" action="{{ route('products.index') }}" method="GET" role="search">
                <input class="form-control" type="text" name="term" id="term" placeholder="Search"
                    aria-label="Search" value="{{ request()->get('term', '') }}">
                <div class="ps-1"></div>
                <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"
                        style="color: #198754;"></i></button>
                <div class="ps-1"></div>
                <div class="vr"></div>
                <div class="ps-1"></div>
                <a class="btn btn-outline-danger" href="{{ route('products.index') }}"><i class="fa-solid fa-arrows-rotate"
                        style="color: #ff0000;"></i></a>
            </form>
        </div>

        <div class="card shadow-sm rounded border-primary">
            <table class="table mt-1">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Variation</th>
                        <th scope="col"></th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col ps-2">Quantity</th>
                        <th scope="col">Add to cart</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $key++ }}</th>
                            <td><a
                                    class="fw-bold text-uppercase text-dark text-decoration-none"href="{{ route('products.show', [$product->id]) }}">{{ $product->name }}</a>
                            </td>
                            <td><a class="text-dark"
                                    href="{{ route('brands.show', [$product->brand->id]) }}">{{ $product->brand->name }}</a>
                            </td>
                            <td><a class="text-dark"
                                    href="{{ route('variation.show', [$product->variation->id]) }}">{{ $product->variation->name }}</a></td>
                            <td></td>
                            <td><a class="text-dark"
                                    href="{{ route('categories.show', [$product->category->id]) }}">{{ $product->category->name }}</a>
                            </td>
                            <td>
                                <div class="badge bg-primary w-100 rounded-pill">RM {{ $product->price }}</div>
                            </td>
                            <td>
                                @if ($product->quantity > 0)
                                    <div class="badge col-12 bg-primary rounded-pill">{{ $product->quantity }}</div>
                                @else
                                    <a class="badge col-12 bg-danger text-decoration-none rounded-pill">0</a>
                                @endif
                            </td>
                            <td>
                                @if ($product->quantity > 0)
                                    <a href="{{ route('addproducts.to.cart', $product->id) }}"
                                        class="text-decoration-none badge col-7 bg-success rounded-pill"><i
                                            class="fa-solid fa-cart-plus" style="color: #ffffff;"></i></a>
                                    <br>
                                @else
                                    <a href="{{ route('addproducts.to.cart', $product->id) }}"
                                        class="text-decoration-none badge col-7 bg-danger rounded-pill"><i
                                            class="fa-solid fa-cart-plus" style="color: #ffffff;"></i></a>
                                    <br>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card mt-2 mb-4">
            <div class="">
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-primary w-100">Create a new
                    Product</a>
            </div>
        </div>
    </div>
@endsection
