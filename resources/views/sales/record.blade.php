@extends('layout')

@section('content')
    <div class="container">
        <div class="row  justify-content-center">
            <div class="fw-bold display-6 mt-2 mb-2">Total Sales</div>
            <div class="col-6">
                @foreach ($sales as $sale)
                    <div class="card w-75 mb-2">
                        <a class="btn btn-sm" href="{{ route('sales.show', [$sale->id]) }}">RM {{ $sale->totalSales }} ||
                            Invoice Details_{{ $sale->created_at }}</a>
                    </div>
                @endforeach
            </div>

            <div class="col-6">
                <div class="card justify-content-center align-items-center">
                    <div class="p-2">
                        <h5 class="fw-bold">TOTAL SALE = RM {{ number_format($total, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        
        <br>
    </div>
@endsection
