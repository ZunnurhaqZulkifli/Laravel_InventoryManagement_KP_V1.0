@extends('layout')

{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}

@section('content')
    <div class="container">

        <div></div>

        <div class="row">
            <div class="col-9">
                <table id="cart" class="mt-4 table table-bordered">

                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Edit</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <tr rowId="{{ $id }}">
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-1 hidden-xs"></div>
                                            <div class="col-sm-5">
                                                <a href="{{ route('products.show', [$details['id']]) }}"
                                                    class="h4 text-decoration-none nomargin">{{ $details['brand'] }} /
                                                    {{ $details['name'] }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">RM{{ $details['price'] }}</td>

                                    <td data-th="Subtotal" class="text-center">
                                        <a>{{ $details['quantity'] }}</a>
                                        @php $totalPrice += $details['quantity']*$details['price'] @endphp
                                    </td>

                                    <td class="Add">
                                        <a href="{{ route('addproducts.to.cart', $details['id']) }}"
                                            class="btn btn-sm btn-outline-warning">+</a>
                                        <a href="{{ route('remove.items', $details['id']) }}"
                                            class="btn btn-sm btn-outline-warning">-</a>
                                    </td>

                                    <td class="test">
                                        <a class="btn btn-outline-danger btn-sm delete-product"><i
                                                class="fa fa-trash-o"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">
                                @if ($totalPrice > 0)
                                    <form action="{{ route('sales.add') }}" method="POST">
                                        @csrf
                                        <div class="d-flex">
                                            <a href="{{ route('products.all') }}" class="btn btn-primary"><i
                                                    class="fa fa-angle-left"></i>
                                                All Products
                                            </a>

                                            <div class="ps-1"></div>

                                            <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                                            <button class="btn btn-success" type="submit">Sale</button>
                                    </form>
                                @else
                                    <div class="d-flex">
                                        <a href="{{ route('products.all') }}" class="btn btn-primary"><i
                                                class="fa fa-angle-left"></i>
                                            All Products
                                        </a>
                                        <div class="ps-1"></div>
                                    </div>
                                @endif
            </div>
            </td>
            </tr>
            </tfoot>

            <tr>
                <td colspan="1" class="text-right">

                </td>

                <td colspan="2" class="">
                    <div class="p-2 fw-bold">Item Amount = RM{{ number_format($totalPrice, 2) }}</div>
                </td>

                <td colspan="5" class="text-right">
                </td>
            </tr>
            </table>
        </div>

        <div class="col-3 mt-4">
            <div class="card rounded-0">
                <div class="p-2 text-center">
                    <div class="display-6 ps-2">Return Back</div>
                    <p class="ps-2">Please do take note, that this feature is experimental and not accurate</p>

                        <div class="card">
                            <form id="cart-form">
                                <div class="p-2">
                                    <label>CASH GIVEN (RM)</label>
                                    <input type="number" name="cash" id="cash" value="0" class="form-control"
                                        max="50">
                                    <input type="number" name="tp" id="tp"
                                        value="{{ number_format($totalPrice, 2) }}" hidden>
                                </div>
                            </form>
                            <div class="p-2">
                                <div class="btn btn-sm disabled w-100" id="totalPayableAmount"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $(".edit-cart-info").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.sopping.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId"),
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".delete-product").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });

        $(document).ready(function() {
            function updatePayableAmount() {
                var cash = parseFloat($('#cash').val());
                var tp = parseFloat($('#tp').val());
                $.ajax({
                    type: 'POST',
                    url: '{{ route('calculatePayableAmount') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        tp: tp,
                        cash: cash,
                    },
                    success: function(response) {
                        $('#totalPayableAmount').text('Amount Return: ' + response
                            .totalPayableAmount);
                    },
                });
            }

            $('#cash').on('input', function() {
                updatePayableAmount();
            })
            updatePayableAmount();
        });
    </script>
@endsection
