@extends('layout')

@section('content')
    <div class="display-2 text-center mb-4">Categories</div>

    <div class="card text-center">
        <div class="card-header">
            <h4>All The Categories</h4>
            @foreach ($categories as $category)
                <a class="btn btn-sm mb-1 btn-outline-dark"
                    href="{{ route('categories.edit', [$category->id]) }}">{{ $category->name }}</a> |
            @endforeach
            <a class="btn btn-sm mb-1 btn-outline-dark" href="{{ route('categories.create') }}">Create New</a>
        </div>

        <div class="card-body">
            <div class="p-1 row row-cols-6 row-cols-md-4 g-2">
                @foreach ($categories as $category)
                    <div class="p-1 card mb-2 mx-auto" style="width: 15em">
                        <a class="btn btn-sm"
                            href="{{ route('categories.show', [$category->id]) }}">{{ $category->name }}</a>

                        <div class="image p-2">
                            <img class="img-fluid object-fit-contain border rounded" style="width:270px; height:140px;"
                                @if ($category->image) src="{{ $category->image->url() }}"
                                @else
                                    src="{{ asset('images/NULL.jpg') }}" @endif>
                        </div>

                        @foreach ($category->products as $product)
                            <a class="btn btn-sm btn-outline-dark mb-2 rounded-0"
                                href="{{ route('products.show', [$product->id]) }}">{{ $product->name }}</a>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <hr>
            <a class="btn btn-sm w-100 btn-outline-dark" href="{{ route('categories.create') }}">Add a New Category</a>
        </div>
    </div>

    <div class="mt-4">

    </div>
@endsection
