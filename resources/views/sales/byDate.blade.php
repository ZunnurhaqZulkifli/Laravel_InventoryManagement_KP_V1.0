@extends('layout')

@section('content')
    <div class="container">
        <div class="p-2">
            
            <div class="row justify-content-center">
                <div class="fw-bold display-6 mt-2 mb-2">Total Sales<span> Yesterday</span></div>
                <div class="card">
                    <div class="col-9">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Invoice_ID</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($SalesCountedYesterday as $sale)
                                    <tr>
                                        <td>{{ $key++ }}</td>
                                        <td>
                                            <a href="{{ route('sales.show', [$sale->id]) }}">Invoice
                                                Details_{{ $sale->created_at }}</a>
                                        </td>

                                        <td>
                                            <a>RM {{ $sale->totalSales }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="">
                                        <div class="fw-bold">TOTAL SALE = RM {{ number_format($total, 2) }}</div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                {{-- <a class="w-100 btn btn-sm btn-outline-success mt-2" href="{{ route('sales.record') }}">Go Total</a> --}}
            </div>
        </div>
    </div>
@endsection
