@extends('layout')

@section('content')
<br>
<div class="mt-2">
    <form class="d-flex" action="{{ route('products.all') }}" method="GET" role="search">
        <input class="form-control" type="text" name="term" id="term" placeholder="Search" aria-label="Search"
            value="{{ request()->get('term', '') }}">
            <div class="ps-1"></div>
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #198754;"></i></button>
        <div class="ps-1"></div>
        <a class="btn btn-outline-danger" href="{{ route('products.all') }}"><i class="fa-solid fa-arrows-rotate" style="color: #ff0000;"></i></a>
    </form>
</div>
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

    <div class="card shadow-sm bg-body-tertiary rounded">
        <div class="row p-2">
            <div class="col-2">
                <p class="fw-bold ps-2">Name</p>
                @foreach ($products as $product)
                    <a class="fw-bold p-2 text-uppercase text-dark"
                        href="{{ route('products.show', [$product->id]) }}">{{ $product->name }}</a>
                    <br>
                @endforeach
            </div>

            <div class="col-2">
                <p class="fw-bold">Brands</p>
                @foreach ($products as $product)
                    <a class="text-dark"
                        href="{{ route('brands.show', [$product->brand->id]) }}">{{ $product->brand->name }}</a></a>
                    <br>
                @endforeach
            </div>

            <div class="col-2">
                <p class="fw-bold">Category</p>
                @foreach ($products as $product)
                    <a class="text-dark"
                        href="{{ route('categories.show', [$product->category->id]) }}">{{ $product->category->name }}</a>
                    <br>
                @endforeach
            </div>

            <div class="col-2">
                <p class="fw-bold">Variation</p>
                @foreach ($products as $product)
                    <div>{{ $product->variation->name }}</div>
                @endforeach
            </div>

            <div class="col-1">
                <p class="fw-bold ps-4">Price</p>
                @foreach ($products as $product)
                    <div class="badge bg-primary w-100 rounded-pill">RM {{ $product->price }}</div>
                @endforeach
            </div>

            <div class="col-2">
                <p class="fw-bold">Qty</p>
                @foreach ($products as $product)
                    @if ($product->quantity >= 0)
                        <div class="badge col-2 bg-primary rounded-pill">{{ $product->quantity }}</div>
                    @else
                        <a class="badge bg-danger rounded-pill">0</a>
                    @endif
                    <br>
                @endforeach
            </div>

            <div class="col-1">
                <p class="fw-bold">Add cart</p>
                @foreach ($products as $product)
                    @if ($product->quantity > 0)
                        <a href="{{ route('addproducts.to.cart', $product->id) }}" class="text-decoration-none badge bg-success rounded-pill">+
                            Cart</a>
                        <br>
                    @else
                        <a class="error badge bg-danger rounded-pill text-decoration-none">+
                            Cart</a>
                        <br>
                    @endif
                @endforeach
            </div>

        </div>
    </div>

    <a class="mt-2 btn btn-sm btn-outline-primary shadow-sm col-12" href="{{ route('products.create') }}">Add Product</a>

    <div class="card mt-4">
        <div>

        </div>
    </div>
@endsection
