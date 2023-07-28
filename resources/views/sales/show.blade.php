@extends('layout')

@section('content')
    <div class="container">

        <div class="mt-4">
            <div class="display-3 fw-bold">Sales<a class="fw-light text-decoration-none text-dark">_{{ $sale->id }}</a>
            </div>
        </div>

        <div class="card w-50">
            <div class="p-4">

                <a class="text-decoration-none text-dark">Recipt ID : {{ $sale->id }}_{{ $sale->created_at }}</a>
            <br>
                <a>Items Sold</a>
            <br>
                (@foreach ($items as $item)
                    <a>{{ $item }}</a>
                @endforeach

                @foreach ($quantities as $quantity)
                    X<a>{{ $quantity }}</a>
                @endforeach

                @foreach ($productItems as $pi)
                    <a href="{{ route('products.show', [$pi]) }}">Product_{{ $pi }}</a>
                @endforeach)

                <a href="{{ route('sales.user',[$userId]) }}" class="text-dark">Seller = {{ $userId }}</a>    
                
                <br>
                <hr>

                <div class="card">
                    <div class="p-1 justify-content-center mx-auto">
                        <a>TOTAL = RM{{ $sale->totalSales }}</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
