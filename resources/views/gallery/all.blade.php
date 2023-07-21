@extends('layout')

@section('content')

<div class="display-2">Galleries</div>
    <div class="card mt-2">
        <div class="p-4">
            <div class="fw-bold h4">Products Images</div>
            <p>Dimentions for a proper photo is</p>
            <hr>
            @foreach ($productImages as $productImage)
                @if ($productImage->image)
                    <a href="{{ route('products.show', [$productImage->id]) }}"><img class="p-2 border mt-2 rounded img-fluid" src="{{ $productImage->image->url() }}" style="height: 150px;width:280px;"></a>
                @else
                    <a href="{{ route('products.edit', [$productImage->id]) }}" class="btn btn-lg">{{ $productImage->name }}</a>
                @endif
            @endforeach
            <hr>
        </div>
    </div>

    <hr>

    <div class="card">
        <div class="p-4">
            <div class="fw-bold h4">Home Images</div>
            <p>Dimentions for a proper photo is</p>
            <hr>
            @foreach ($homeImages as $homeImage)
                @if ($homeImage->image)
                    <img class="p-2 border rounded img-fluid" src="{{ $homeImage->image->url() }}" style="height: 150px;width:280px;">
                @else
                    <a href="{{ route('products.edit', [$productImage->id]) }}" class="btn btn-lg">{{ $productImage->name }}</a>
                @endif
            @endforeach
            <hr>

            <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('gallery.create') }}">Add a home slider images</a>
        </div>
    </div>

    <hr>

    <div class="card mt-2">
        <div class="p-4">
            <div class="fw-bold h4">Category Images</div>
            <p>Dimentions for a proper photo is</p>
            <hr>
            @foreach ($categoryImages as $categoryImage)
                @if ($categoryImage->image)
                    <img class="p-2 border rounded img-fluid" src="{{ $categoryImage->image->url() }}" style="height: 150px;width:280px;">
                @else
                    <img class="img-fluid object-fit-cover border rounded" style="width:280px; height:150px;" src="{{ asset('images/NULL.jpg') }}">
                @endif
            @endforeach
            <hr>

            <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('categories.create') }}">Add a category image</a>
        </div>
    </div>

    
    

@endsection
