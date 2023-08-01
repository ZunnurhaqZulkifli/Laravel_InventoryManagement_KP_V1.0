@extends('layout')


@section('content')
    <div class="container">

        <div class="display-2">Add A Product</div>

        <hr>

        <div class="card">
            <div class="p-3">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label>Product's Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Bundaberg (RootBeer)"
                            value="{{ old('name', $product->name ?? null) }}" required>
                    </div>

                    <div class="form-group mt-2">
                        <label>Product's Price</label>
                        <input name="price" type="float" class="form-control" placeholder="7.50"
                            value="{{ old('price', $product->price ?? null) }}" required>
                    </div>

                    <div class="form-group mt-2">
                        <label>Product's Description</label>
                        <input name="description" type="text" class="form-control" placeholder="Air Mineral"
                            value="{{ old('description', $product->description ?? null) }}">
                    </div>

                    <div class="form-group mt-2">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="brand_id">Brands</label>
                        <select class="form-control" name="brand_id" id="brand">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>

                        <div class="form-group mt-2">
                            <label for="variation_id">Variations</label>
                            <select class="form-control" name="variation_id" id="variation">
                                @foreach ($variations as $variation)
                                    <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                                @endforeach
                            </select>

                            <label class="mt-2">Add Images - </label>
                            <div class="form-group card">
                                <div class="p-2">
                                    <input type="file" name="thumbnail" class="form-control-file">
                                </div>
                            </div>

                            <label class="mt-2">Quantity</label>
                            <div class="form-group-card">
                                <div class="p-2">
                                    <input type="number" name="quantity" class="form-control" placeholder="1"
                                        value="{{ old('quantity', $product->quantity ?? 1) }}">
                                </div>
                            </div>

                            <div class="form-group-card">
                                <div class="p-2">
                                    <input type="number" name="on_pressed" class="form-control" placeholder="1"
                                        value="{{ old('on_pressed', $product->quantity ?? 1) }}" hidden>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="mt-4 btn btn-sm col-12 btn-outline-primary">Add Items</button>
                </form>
            </div>
        </div>
    </div>

<hr>

    @can('create')

        <a class="mb-4 w-100 btn btn-sm btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
            aria-expanded="false" aria-controls="collapseExample">
             Add New | Category | Brand | Variation 
        </a>

        <div class="collapse" id="collapseExample">

            <div class="card bg-shadow-sm mt-4 mb-4">

                <div class="fw-bold display-5 text-center mt-4">Master Create</div>

                <div class="p-2">
                    <div class="card">


                        <div class="p-3">
                            <div class="fw-bold h5 text-center">Create New Category</div>
                            <div class="card">
                                <div class="p-2">
                                    <h4>Lists of all the categories</h4>
                                    @foreach ($categories as $category)
                                        <a href="{{ route('categories.edit', [$category->id]) }}"
                                            class="btn btn-sm mb-1 btn-outline-dark">{{ $category->name }}</a> |
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group mt-2">
                                        <label>Categories</label>
                                        <input name="name" type="text" class="form-control" placeholder="Drinks"
                                            value="{{ old('name', $category->name ?? null) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="mt-2">(Not Required) Add Images </label>
                                        <div class="form-group-card">
                                            <div class="p-2">
                                                <input type="file" name="thumbnail" class="form-control-file">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="mt-2 btn btn-sm w-100 btn-outline-dark">Create !</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card">
                        <div class="p-3">

                            <div class="fw-bold h5 text-center">Create New Brand</div>

                            <div class="card">
                                <div class="p-3">
                                    <h4>Lists of all the brands</h4>
                                    @foreach ($brands as $brand)
                                        <a href="{{ route('brands.edit', ['brand' => $brand->id]) }}"
                                            class="btn btn-sm mb-2 btn-outline-dark">{{ $brand->name }}</a> |
                                    @endforeach
                                </div>
                            </div>

                            <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/from-data">
                                @csrf
                                <div>
                                    <div class="h4 mt-3">Add a new brand</div>
                                    <input name="name" type="text" class="form-control" placeholder="Coca Cola"
                                        value="{{ old('name', $brand->name ?? null) }}" required>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="category_id">Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option>Default</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="mt-4 btn btn-sm col-12 btn-outline-dark">Add Brands</button>
                            </form>
                        </div>
                    </div>

                    <hr>
                    <div class="card">
                        <div class="p-3">

                            <div class="fw-bold h5 text-center">Create New Variation</div>

                            <div class="card">
                                <div class="p-2">
                                    <h4>Lists of all the variations</h4>
                                    @foreach ($variations as $variation)
                                        <a href="{{ route('variation.edit', [$variation->id]) }}"
                                            class="btn btn-sm mb-2 btn-outline-dark">{{ $variation->name }}</a> |
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-4">
                                <form method="POST" action="{{ route('variation.store') }}" enctype="multipart/from-data">
                                    @csrf
                                    <div>
                                        <div class="h4">Add a new variation</div>
                                        <input name="name" type="text" class="form-control" placeholder="Tin / Bottle"
                                            value="{{ old('name', $variation->name ?? null) }}" required>
                                    </div>

                                    <button type="submit" class="mt-4 btn btn-sm col-12 btn-outline-dark">Add
                                        Variation</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    @endcan
    </div>
@endsection('content')
