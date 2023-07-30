@extends('layout')

@section('content')
    <div class="container">
        <div class="display-6">ALL USERS</div>
        <hr>

        <div class="row">
            @foreach ($users as $user)
                <div class="col-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="fw-bold h5">{{ $user->name }}</div>
                                <div class="bg-white border rounded">
                                    <div class="p-1 text-dark"> RM{{ number_format($user->total_sales, 2) }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="">
                                        @if ($user->is_admin)
                                            <a>User is admin</a>
                                        @else
                                            <a>User is not admin</a>
                                        @endif
                                    </div>

                                    <div class="">
                                        {{ $user->created_at->format('d/m/Y/H:i') }}
                                    </div>

                                    <div class="">
                                        <div class="">
                                            <div class="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="text-center">
                                        @if ($user->image)
                                            <img class="border rounded object-fit-contain img-fluid border-warning"
                                                src="{{ $user->image->url() }}" style="height: 150px;width:150px;">
                                        @else
                                            <a class="btn btn-lg btn-outline-dark img-fluid"
                                                style="width:150px; height:150px;"
                                                href="{{ route('users.edit', [$user->id]) }}">{{ $user->name }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                            <a href="{{ route('sales.user', [$user->id]) }}"
                                class="btn btn-sm btn-outline-success">Sales</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <hr>

        @can('view')
            <div class="display-6">Sales Performance</div>

            <hr>

            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Sales Performance
                </a>
            </p>

            <div class="collapse" id="collapseExample">
                <div class="row">
                    @foreach ($topSales as $sale)
                        <div class="col-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            {{ $sale->name }}
                                        </div>

                                        <div>
                                            RM {{ number_format($sale->sales->sum('totalSales'), 2) }}
                                        </div>
                                    </div>
                                </div>
                                <table class="cart-body table mb-0">
                                    @forelse($sale->sales->take(3) as $sale)
                                        <tr>
                                            <td class="px-3">{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-end px-3">
                                                {{ $sale->totalSales }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>
                                                <a href="" class="text-danger">No Sales Yet!</a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endcan
    </div>
@endsection
