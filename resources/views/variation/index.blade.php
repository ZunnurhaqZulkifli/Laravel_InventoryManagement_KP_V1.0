@extends('layout')

@section('content')

<div class="container">
    <div class="card mb-4">
        <div class="row p-3 mb-2">
        <div class="display-2 text-center mb-2">All The Variation</div>
            @foreach ($variations as $variation)
                <div class="card text-center mb-1">
                    <div class="card-body">
                        <div class="display-6 mb-2">{{ $variation->name }}</div>
                        @foreach ($variation->products as $product)
                            <a class="btn btn-sm col-4 btn-outline-dark mb-2 rounded-0" href="{{ route('products.show', [$product->id]) }}">{{ $product->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="p-1">
            <a class="btn btn-sm w-100 btn-outline-success" href="{{ route('variation.create') }}">Add a Variation</a>
        </div>
    </div>
</div>

@endsection