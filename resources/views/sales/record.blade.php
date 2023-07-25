@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="fw-bold display-6 mt-2 mb-2">Total Sales</div>

            <div class="col-9">
                @foreach ($sales as $sale)
                    <div class="card mb-2">
                        <a class="btn btn-sm" href="{{ route('sales.show', [$sale->id]) }}">RM {{ $sale->totalSales }} ||
                            Invoice Details_{{ $sale->created_at }}</a>
                    </div>
                @endforeach

                <div class="card justify-content-center align-items-center">
                    <div class="p-2">
                        <h5 class="fw-bold">TOTAL SALE = RM {{ number_format($total, 2) }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card">
                    <div class="h3 text-center mt-2">Yesterday's Sales</div>
                    <div class="p-2">
                        <a class="btn btn-sm btn-outline-dark w-100 mb-2 disabled">RM{{ $SalesCountedYesterday }}</a>
                    </div>
                </div>

            <hr>

                <div class="card">
                    <div class="h3 text-center mt-2">Yesterday's Sales</div>
                    <div class="p-2">
                        <a class="btn btn-sm btn-outline-dark w-100 mb-2 disabled">RM{{ $SalesCountedYesterday }}</a>
                    </div>
                </div>
            </div>
        </div>

        <a class="w-100 btn btn-sm btn-outline-success mt-2" href="{{ route('sales.byDate') }}">by Date</a>
    </div>
@endsection
