<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Real Estate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>

</head>

<body class="authentication-bg">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-dark">
                        <a href="/login">
                            <span class="text-white">MS Resource</span>
                            {{--                            <span><img src="{{asset('assets/images/iTechm.png')}}" alt="" height="18"></span>--}}
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h4>
                            <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email"
                                        placeholder="Enter your email" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <a href="{{ route('password.request') }}" class="text-muted float-right">
                                    <small>Forgot your password?</small>
                                </a>
                                <label for="password">Password</label>
                                <input  class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="Password"
                                        name="password" type="password" required autocomplete="current-password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                                @endif
                                </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="form-control btn btn-dark" type="submit"> Log In</button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Don't have an account? <a href="#"
                                                                        class="text-muted ml-1"><b>Sign Up</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
    2018 - 2020 © Real Estate
</footer>

<!-- bundle -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>

</body>
</html>
