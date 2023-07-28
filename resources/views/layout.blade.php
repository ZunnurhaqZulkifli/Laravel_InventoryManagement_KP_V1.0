<!DOCTYPE html>
<html lang="en" data-bs-theme="light"> {{-- data-bs-theme="dark"  --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/bdf084cd10.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        function passVisib() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <title>Inventory Manager</title>

</head>

<body>

    <div class="navbar navbar-dark d-flex flex-column flex-md-row p-3 px-md-4 mb-3 shadow">

        <div class="d-flex">
            <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"
                class="btn btn-outline-primary"><i class="fa-solid fa-bars"></i></a>
            <a class="h3 ps-2 my-1 mr-md-auto text-decoration-none">Inventory Management</a>
        </div>

        <nav class="my-md-0 mr-md-3">

            <a class="btn btn-outline-primary" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
            <a class="btn btn-outline-primary" href="{{ route('products.all') }}"><i
                    class="fa-solid fa-bag-shopping"></i> Products</a>
            <a class="btn btn-outline-primary" href="{{ route('products.create') }}"><i class="fa-solid fa-barcode"></i>
                Create</a>
            <a class="btn btn-outline-primary" href="{{ route('brands_all') }}"><i class="fa-brands fa-apple fa-lg"></i>
                Brands</a>

            @guest
                @if (Route::has('login'))
                    <a class="btn btn btn-outline-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
            @else
                <a class="btn btn btn-outline-primary" href="{{ route('users.show', [ Auth::user()->id]) }}" role="button">
                    <i class="fa-regular fa-user"></i> {{ Auth::user()->name }}
                </a>

                <a class="btn btn-outline-primary" href="{{ route('shopping.cart') }}">
                    <i class="fa fa-shopping-cart"></i> <span
                        class="badge text-bg-primary">{{ count((array) session('cart')) }}</span>
                </a>
            @endguest
        </nav>
    </div>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
        id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="card">
                <div class="p-4">
                    <h5 class="offcanvas-title text-center" id="offcanvasScrollingLabel">Master Control</h5>
                    <hr>
                    <div class="d-flex justify-content-center">

                        <a class="btn btn-outline-dark" href="{{ route('shopping.cart') }}">
                            <i class="fa fa-shopping-cart" style="color: #ff4800"></i></a>

                        <div class="ps-1"></div>

                        <a href="{{ route('sales.all') }}" class="btn btn-outline-dark"><i
                                class="fa-solid fa-cash-register" style="color: #ff4800"></i></a>

                        <div class="ps-1"></div>

                        <a href="{{ route('products.stats') }}" class="btn btn-outline-dark"><i
                                class="fa-solid fa-chart-line" style="color: #ff4800"></i></a>

                        <div class="ps-1"></div>

                        @guest
                            @if (Route::has('login'))
                                <a class="p-2 btn btn-sm btn-outline-dark" href="{{ route('login') }}"><i
                                        class="fab fa-laravel" style="color: #ff4800"></i> LOGIN</a>
                            @endif
                        @else
                            @csrf
                            <a class="p-2 btn btn btn-outline-dark" href="{{ route('logout') }}" style="color: #ff4800"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fab fa-laravel" style="color: #ff4800"></i> LOGOUT</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest

                        <div class="ps-1"></div>
                        <a class="btn btn-outline-dark" href="{{ url()->previous() }}" style="color: #ff4800">BACK</a>
                        
                    </div>

                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                            checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Dark Mode</label>
                    </div>
                </div>
            </div>

            <hr>

            <div class="card">
                <div class="p-1 text-center">
                    <div class="fs-5">Product's Menu</div>
                    <div class="justify-content-center">
                        <div class="d-flex p-2 row row-cols-4 row-cols-lg-4 g-1">

                            <div class="col">
                                <a class="w-100 btn btn-sm btn-outline-dark" href="{{ route('products.all') }}"><i
                                        class="fa-solid fa-bag-shopping"></i><br>Products</a>
                            </div>

                            <div class="col">
                                <a class="w-100 btn btn-sm btn-outline-dark"
                                    href="{{ route('categories.products') }}">
                                    <i class="fa-solid fa-filter"></i><br>Category</a>
                            </div>

                            <div class="col">
                                <a class="w-100 btn btn-sm btn-outline-dark" href="{{ route('brands_all') }}">
                                    <i class="fa-brands fa-apple fa-lg"></i><br>Brands</a>
                            </div>

                            <div class="col">
                                <a class="w-100 btn btn-sm btn-outline-dark" href="{{ route('products.index') }}">
                                    <i class="fa-solid fa-list-ul"></i><br>Index</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-2 text-center">

                </div>
            </div>

            <hr>

            <div class="card mt-2">
                <div class="p-2 text-center">
                    <div class="fs-5">Admin Pannel</div>
                    <hr>
                    <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('brands.create') }}"> Add New
                        Brands </a>
                    <hr>
                    <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('categories.create') }}"> Add
                        New Category </a>
                    <hr>
                    <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('variations.create') }}"> Add
                        New Variaiton </a>
                    <hr>
                    <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('gallery.all') }}"><i
                            class="fa-regular fa-images"></i> Images</a>
                    <hr>

                    <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('products.stats') }}">Product
                        Stats</a>
                    <hr>
                    <a class="btn btn-sm btn-outline-dark w-100" href="{{ route('sales.all') }}">Sales</a>

                </div>

                <div class="p-2 text-center">

                </div>
            </div>
        </div>
    </div>

    <div class="">
        @if (session()->has('status'))
            <p style="color: green">
                {{ session()->get('status') }}
            </p>
        @endif

        <div class="container">
            @include('flash-message')
            {!! Toastr::message() !!}
            @yield('content')
        </div>

    </div>

    @yield('scripts')

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
