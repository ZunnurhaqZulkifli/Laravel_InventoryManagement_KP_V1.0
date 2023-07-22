@extends('layout')

@section('content')
    <div class="container">

        <div class="mt-4">
            <div class="display-3">Sales</div>
        </div>

        <div class="card w-50">
            <div class="p-4">
                
                <a class="text-decoration-none text-dark" >Recipt ID_{{ $sale->id }} {{ $sale->created_at }}</a>
                <br>
                <a>Items Sold</a>
                <br>
                (@foreach ($items as $item)
                    <a>{{ $item }}</a>
                @endforeach

                @foreach ($quantities as $quantity)
                    X<a>{{ $quantity }}</a>
                @endforeach)

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
