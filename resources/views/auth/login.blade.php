@extends('layout')

@section('content')
    <section class="vh-70 gradient-custom">
        <div class="py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-sm-6 col-xl-4">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-1 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                
                                <form method="POST" action="{{ route('login') }}">
                                @csrf
                                    
                                <div class="form-outline form-white mb-2">
                                    <input id="email" type="email"
                                        placeholder="Email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-2">
                                    <input id="myInput" type="password"
                                        placeholder="Password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">


                                    <div class="form-outline form-white mt-2 mb-4">
                                        <input class="mt-2" type="checkbox" onclick="return passVisib()"> Show Password
                                        <br>
                                        <input class="mt-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>   Remember Me
                                    </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <button class="btn btn-outline-light btn-lg w-100" type="submit">Login</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                                </form>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? 
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="text-white-50 fw-bold">Sign Up</a>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
