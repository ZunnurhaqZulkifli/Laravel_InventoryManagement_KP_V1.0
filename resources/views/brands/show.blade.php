@extends('layout')

@section('content')
    <div class="display-6">{{ $brands->name }}</div>
    <div class="card mt-2">
        <div class="p-3 row row-cols-2 row-cols-md-3 g-3">
            @foreach ($brands->products as $product)
                <div class="card mb-2 mx-auto" style="width: 20em">
                    @if ($product->image)
                        <div class="card mt-4 mx-auto">
                            <center class="object-fit-none border rounded"><img class="img-fluid" style="width:140px; height:140px;"
                                    src="{{ $product->image->url() }}"></center>
                        </div>
                    @else
                        <div class="mt-2 card mx-auto justify-content-center align-items-center" style="width:140px; height:140px;">
                            <a class="" href="{{ route('products.edit', [$product->id]) }}">Add Images</a>
                        </div>
                    @endif

                    <hr>

                    <a href="{{ route('products.show', [$product->id]) }}"
                        class="fw-bold text-center text-dark text-decoration-none">{{ $product->name }} ||
                        {{ $product->variation->name }}</a>
                    <a class="text-center text-dark text-decoration-none">Harga : RM {{ $product->price }}</a>
                </div>
            @endforeach
        </div>
        <div class="p-2">
            <a class="w-100 btn btn-sm btn-outline-warning" href="{{ route('products.create') }}">Add New Product</a>
        </div>
    </div>
@endsection
