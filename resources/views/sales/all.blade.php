@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="fw-bold display-6 mt-2 mb-2">Total Sales All</div>

            <div class="">
                <div class="">

                </div>
            </div>

            {{-- <div class="card"> --}}
            <div class="col-9">
                <table class="table table-striped border">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Invoice_ID</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                        @foreach ($allSales as $sale)
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
                                <div class="fw-bold">TOTAL SALE = RM {{ number_format($allSalesTotal, 2) }}</div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-3">

                <div class="card rounded-0">
                    <div class="h3 text-center mt-2">Total Sales</div>
                    <div class="p-2">
                        <a class="btn btn-sm btn-outline-dark w-100 mb-2 disabled">TOTAL SALE = RM
                            {{ number_format($allSalesTotal, 2) }}</a>
                    </div>
                </div>

                <hr>

                <div class="card rounded-0">
                    <div class="h3 text-center mt-2">Today's Sales</div>
                    <div class="p-2">
                        <a class="btn btn-sm btn-outline-dark w-100 mb-2"
                            href="{{ route('sales.today') }}">RM{{ $totalSalesToday }}</a>
                    </div>
                </div>

                <hr>

                <div class="card rounded-0">
                    <div class="h3 text-center mt-2">Yesterday</div>
                    <div class="p-2">
                        <a class="btn btn-sm btn-outline-dark w-100 mb-2"
                            href="{{ route('sales.yesterday') }}">RM{{ $totalSalesYesterday }}</a>
                    </div>
                </div>

                <hr>

            </div>
        </div>

        <div class="mt-2 mb-4">

        </div>
    </div>
    </div>
@endsection
