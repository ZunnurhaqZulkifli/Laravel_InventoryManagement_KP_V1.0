@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="fw-bold display-6 mt-2 mb-2">Total Sales</div>

            @foreach ($sales as $sale)
            <div class="col-6 justify-content-center">
                <div class="card w-50 mb-2">
                    <a class="btn btn-sm" href="{{ route('sales.show', [$sale->id]) }}">RM {{ $sale->totalSales }} || Invoice Details_{{ $sale->created_at }}</a>
                </div>
            </div>
            @endforeach
        
            <div class="col-6">
                <div class="card">
                    <a class="">{{ $totalQty }}</a>
                </div>    
            </div>
        </div> 

        <hr>
            <h5 class="fw-bold">TOTAL SALE = RM {{ number_format($total, 2) }}</h5>
        <br>
    </div>
@endsection
