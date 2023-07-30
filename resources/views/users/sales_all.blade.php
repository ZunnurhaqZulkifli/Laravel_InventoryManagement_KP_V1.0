@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-6">
                <div class="card">
                    <div class="p-2">
                        <div class="display-6">All The Users</div>
                        <hr class="">
                        <div class="text-center">
                            @foreach ($users as $user)
                                <a href="{{ route('users.show', [$user->id]) }}"
                                    class="col-2 btn btn-sm btn-outline-dark">{{ $user->name }}<br>RM{{ $user->totalSales }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="text-center">
                        ??
                    </div>
                </div>
            </div>

            <div class="col-2">
                <div class="card">
                    <div class="p-2">
                        <div class="text-center">Top 3 Sales</div>
                        @foreach ($highestSales as $sale)
                            @if ($sale->totalSales != 0)
                                <a href="{{ route('users.show', [$sale->id]) }}"
                                    class="w-100 btn btn-sm btn-outline-dark mb-2">RM{{ $sale->totalSales }}</a>
                                <br>
                            @else
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
