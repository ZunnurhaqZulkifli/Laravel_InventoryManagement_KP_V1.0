@extends('layout')

@section('content')
    <div class="container">
        <div class="display-6">My Sales</div>
        <div class="card">
            <table class="table table-striped">

                <thead>
                    <tr class="">
                        <th scope="col">#</th>
                        <th scope="col">Invoice_ID</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($mySales as $sale)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td><a class="text-decoration-none text-dark"
                                    href="{{ route('sales.show', [$sale->id]) }}">{{ $sale->id }}.{{ $sale->created_at->format('d/m/Y H:i') }}</a>
                            </td>
                            <td><a class="text-decoration-none text-dark">RM {{ $sale->totalSales }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
                
                <tfoot>
                    <tr class="">
                        <td></td>
                        <td></td>
                        <td>
                            <div class="fw-bold">TOTAL SALE = RM {{ number_format($myTotalSales, 2) }}</div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
