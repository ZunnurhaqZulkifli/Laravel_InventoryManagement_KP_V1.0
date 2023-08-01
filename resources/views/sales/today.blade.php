@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="display-2">Total Sales<span class="fw-light h1"> (Today)</span></div>
            <div class="card">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice_ID</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($salesToday as $sale)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>
                                        <a class="text-decoration-none text-dark"
                                            href="{{ route('sales.show', [$sale->id]) }}">{{ $sale->id }}_{{ $sale->created_at->format('d/m/Y H:i') }}</a>
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
                                    <div class="fw-bold">TOTAL SALE = RM {{ number_format($totalSalesToday, 2) }}</div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <a class="w-100 btn btn-sm btn-outline-success mt-2" href="{{ route('sales.index') }}">Total Sales</a>
        </div>
    </div>
@endsection
