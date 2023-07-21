@extends('layout')

@section('content')
    <div class="container">


        @foreach ($sales as $sale)
            <div class="">
                <a class="btn btn-sm" href="{{ route('sales.show', [$sale->id]) }}">RM {{ $sale->totalSales }} || Invoice Details_{{ $sale->created_at }}</a>
            </div>
        @endforeach

        <hr>
            <h5 class="fw-bold">TOTAL SALE = RM {{number_format($total, 2)  }}</h5>
        <br>
    </div>
@endsection
