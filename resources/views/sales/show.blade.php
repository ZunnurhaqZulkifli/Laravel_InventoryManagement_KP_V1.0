@extends('layout')

@section('content')

    <div class="container">

        <div class="mt-4">
            <div class="display-3">Sales</div>
        </div>
    
        <div class="card">
            <div class="p-4">

                <a href="" class="">Recipt ID :{{ $sale->id }} / {{ $sale->created_at }}</a>
                <br>
                <a>ITEMS SOLD = ({{ $items }})</a>
                <br>
                <a>TOTAL = RM{{ $sale->totalSales }}</a>
            </div>
        </div>

    </div>

@endsection
