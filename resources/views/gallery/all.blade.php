@extends('layout')

@section('content')

    <div class="container">
        <div class="display-2">Gallery Images</div>
        <div class="card mt-2">
            <div class="p-4">
                <div class="fw-bold h4">Products Images</div>
                <p>Dimentions for a proper photo is</p>
                <hr>
                <div class="text-center">
                    @can('update', $productImages)
                        @foreach ($productImages as $productImage)
                            @if ($productImage->image)
                                <a href="{{ route('products.show', [$productImage->id]) }}"><img
                                        class="border rounded object-fit-contain img-fluid border-warning"
                                        src="{{ $productImage->image->url() }}" style="height: 150px;width:280px;"></a>
                            @else
                                <a class="btn btn-lg btn-outline-dark mt-2 mb-2" style="width:280px; height:150px;"
                                    href="{{ route('products.show', [$productImage->id]) }}">{{ $productImage->name }}</a>
                            @endif
                        @endforeach
                    @else
                        @foreach ($productImages as $productImage)
                            @if ($productImage->image)
                                <a href="{{ route('products.show', [$productImage->id]) }}"><img
                                        class="border rounded object-fit-contain img-fluid border-warning"
                                        src="{{ $productImage->image->url() }}" style="height: 150px;width:280px;"></a>
                            @else
                                <a class="btn btn-lg btn-outline-dark mt-2 mb-2" style="width:280px; height:150px;"
                                    href="{{ route('products.show', [$productImage->id]) }}">{{ $productImage->name }}</a>
                            @endif
                        @endforeach
                    @endcan('update')
                </div>

                <hr>
            </div>
        </div>

        <hr>

        <div class="card">
            <div class="p-4">
                <div class="fw-bold h4">Home Images</div>
                <p>Max Dimentions for a photo is 1920x1080.</p>
                <hr>
                    @can('update', $homeImages)
                        <div class="d-flex text-center">
                            @foreach ($homeImages as $homeImage)
                                <form method="POST" action="{{ route('gallery.destroy', ['gallery' => $homeImage->id]) }}">
                                    @if ($homeImage->image)
                                        <img class="mt-2 mb-2 border-warning border rounded img-fluid"
                                            src="{{ $homeImage->image->url() }}" style="height: 150px;width:280px;">
                                        @csrf
                                        @method('DELETE')
                                    @endif
                                    <button type="submit" onclick="return confirm('Are You Sure Delete This Image ?')"
                                        value="Delete"
                                        class="btn-close opacity-100 bg-danger position-absolute top-10 start-80 translate-middle rounded-circle"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </form>
                                <div class="ps-3"></div>
                            @endforeach
                        </div>

                        <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('gallery.create') }}">Add slider images</a>
                    @else
                    <div class="d-flex text-center">
                        @foreach ($homeImages as $homeImage)
                            @if ($homeImage->image)
                                <img class="border-warning border rounded img-fluid" src="{{ $homeImage->image->url() }}"
                                    style="height: 150px;width:280px;">
                            @else
                                <a class="btn btn-lg btn-outline-dark mt-2 mb-2" style="width:280px; height:150px;"
                                    onclick="return confirm('Get Admin!')">{{ $homeImage->name }}</a>
                            @endif
                            <div class="ps-2"></div>
                        @endforeach
                        <a class="btn btn-sm btn-outline-dark w-100" onclick="return confirm('Get Admin!')">Get Admin</a>
                    </div>
                    @endcan
                <hr>
            </div>
        </div>

        <hr>

        <div class="card mt-2 mb-4">
            <div class="p-4">
                <div class="fw-bold h4">Category Images</div>
                <p>Dimentions for a proper photo is</p>
                <hr>
                <div class="text-center">
                    @can('update', $categoryImages)
                        @foreach ($categoryImages as $categoryImage)
                            @if ($categoryImage->image)
                                <a href="{{ route('categories.show', [$categoryImage->id]) }}"><img
                                        class="border-warning border rounded img-fluid mb-2 mt-2"
                                        src="{{ $categoryImage->image->url() }}" style="height: 150px;width:280px;"></a>
                            @else
                                <a class="btn btn-lg btn-outline-dark mt-2 mb-2" style="width:280px; height:150px;"
                                    href="{{ route('categories.show', [$categoryImage->id]) }}">{{ $categoryImage->name }}</a>
                            @endif
                        @endforeach
                    @else
                        @foreach ($categoryImages as $categoryImage)
                            @if ($categoryImage->image)
                                <a href="{{ route('categories.show', [$categoryImage->id]) }}">
                                    <img class="border-warning border rounded img-fluid mb-2 mt-2"
                                        src="{{ $categoryImage->image->url() }}" style="height: 150px;width:280px;">
                                </a>
                            @else
                                <a class="btn btn-lg btn-outline-dark mt-2 mb-2" style="width:280px; height:150px;"
                                    href="{{ route('categories.show', [$categoryImage->id]) }}">{{ $categoryImage->name }}</a>
                            @endif
                        @endforeach
                    @endcan
                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection
