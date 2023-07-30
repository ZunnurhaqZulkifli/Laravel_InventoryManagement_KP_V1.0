@extends('layout')

@section('content')
    <div class="container">
        <div class="mt-4 display-6">{{ $user->name }}</div>
        <div class="row mt-2">
            <div class="col-6">
                <div class="card">
                    <div class="display-6 text-center">Top 3 Sales</div>
                    <hr class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice_ID</th>
                                <th scope="col">RM_SALE</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mySales as $sale)
                                <tr>
                                    <th scope="row">{{ $key++ }}</th>
                                    <td><a
                                            href="{{ route('sales.show', [$sale->id]) }}">{{ $sale->id }}.{{ $sale->created_at->format('d/m/Y H:i') }}</a>
                                    </td>
                                    <td><a>RM {{ $sale->totalSales }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <tfoot>
                        <div class="p-1">
                            <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('sales.user', [$user->id]) }}">All
                                My Sales</a>
                        </div>
                    </tfoot>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="p-1">
                        <div class="display-6 text-center">Total Sales</div>
                        <a class="w-100 btn btn-sm btn-outline-dark disabled">RM {{ number_format($myTotalSales, 2) }}</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
