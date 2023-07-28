@extends('layout')

@section('content')
    <div class="display-4">Inventory Management</div>
    <div class="row mt-4">
        <div class="col-9">
            <div class="card">
                <div class="p-4">
                    <div class="fs-4 fw-bold mt-1 text-center">Find Products <span class="fs-6 fw-light">powered by ~z.z~</span>
                    </div>
                    <form class="d-flex" action="{{ route('products.all') }}" method="GET" role="search">
                        <input class="form-control" type="text" name="term" id="term" placeholder="Search"
                            aria-label="Search">

                            <div class="ps-1"></div>
                            <div class="vr"></div>
                            <div class="ps-1"></div>
                
                        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #198754;"></i></button>
                    </form>
                </div>
            </div>

    <hr>

            <div class="card shadow-sm p-2 mb-2 bg-body-tertiary rounded">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://miro.medium.com/v2/resize:fit:786/format:webp/1*m0s2io11J82PR7miqan92w.png"
                                class="d-block w-100" alt="...">
                            <center><a>Best Selling</a></center>
                        </div>
                        @foreach ($images as $image)
                            @if ($image->image != null)
                                <div class="carousel-item">
                                    <img src="{{ $image->image->url() }}" class="d-block img-fluid w-100" alt="...">
                                    <center><a>{{ $image->name }}</a></center>
                                </div>
                            @else
                                
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

    <hr>

            <div class="card">
                <div class="h4 text-center mt-2">Good Products</div>
                <div class="p-1 mx-auto row row-cols-md-4 g-4">
                    @foreach ($hotimages as $hotimage)
                        @if ($hotimage->image)
                            <div class="mx-auto mb-2">
                                <a href="{{ route('products.show', [$hotimage->id]) }}" class=""><img
                                        class="card img-fluid object-fit-contain" src="{{ $hotimage->image->url() }}"
                                        style="width:15em; height:7em;">
                                </a>
                                <a class="text-dark text-decoration-none">({{ $hotimage->brand->name}}-{{ $hotimage->name }})</a>
                            </div>
                        @else
                            <div class="btn btn-sm btn-outline-dark">
                                <a class="text-dark"
                                    href="{{ route('products.edit', [$hotimage->id]) }}">{{ $hotimage->name }}</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            @auth
                <div class="mt-2">
                    <a class="btn btn-sm w-100 btn-outline-dark" href="{{ route('gallery.all') }}">Edit Images</a>
                </div>
            @endauth

    <hr>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat expedita veritatis ducimus nisi quae odit,
                sapiente maiores fugit, voluptate ipsum quia hic, dolorem in? Suscipit beatae autem eius iure voluptatibus.
            </p>
        </div>

        <div class="col-3 text-center">        
            <div class="card">
                <div class="fs-4 fw-bold mt-1">Total Sales<span class="fs-6 fw-light"> (Monthly)</span></div>
                <div class="p-2">
                    <div class="d-flex">
                        <a class="btn btn-sm btn-outline-dark w-100 mb-2 disabled">RM{{ number_format($total, 2) }}</a>
                        <div class="ps-1"></div>
                        <a class="btn btn-sm btn-outline-success mb-2" href="{{ route('sales.all') }}">Sales</a>
                    </div>
                </div>
            </div>

            <hr>

            <div class="card mt-2">
                <div class="p-2">
                    <div class="fs-4 fw-bold">Low Stock</div>
                    @foreach ($lowstocks as $lowstock)
                        <a class="btn btn-sm w-100 btn-outline-danger mb-2"
                            href="{{ route('products.stats') }}">{{ $lowstock->brand->name }} . {{ $lowstock->name }}</a>
                        <br>
                    @endforeach
                </div>
            </div>

            <hr>
            
            <div class="card">
                <div class="fs-4 fw-bold mt-1">Best Selling<h6> - by price</h6>
                </div>
                <div class="p-2">
                    @foreach ($hotitems as $hotitem)
                        <a class="btn btn-sm w-100 btn-outline-dark mb-2"
                            href="{{ route('products.show', [$hotitem->id]) }}">{{ $hotitem->name }}</a>
                        <br>
                    @endforeach
                </div>
            </div>

            <hr>

            <div class="card">
                <div class="fs-4 fw-bold mt-1">Recent Sales</div>
                <div class="p-2">
                    @foreach ($sales as $sale)
                        <a class="btn btn-sm w-100 btn-outline-dark mb-2"
                            href="{{ route('sales.show', [$sale->id]) }}">RM{{ $sale->totalSales }}</a>
                        <br>
                    @endforeach
                </div>
            </div>
            
            <hr>

        </div>
    </div>
@endsection('content')
