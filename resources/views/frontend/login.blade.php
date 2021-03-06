
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset ('login_assets/fonts/icomoon/style.')}}css">
    <link rel="stylesheet" href="{{ asset ('login_assets/css/owl.carousel.min.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset ('login_assets/css/bootstrap.min.css')}}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset ('login_assets/css/style.css')}}">

    <title>Eshop-Login</title>
</head>
<body>


<div class="d-md-flex half">
    <div class="bg" style="background-image: url({{ asset ('login_assets/images/bg_1.jpg')}});"></div>
    <div class="contents">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="form-block mx-auto">
                        <div class="text-center mb-5">
                            <h3 class="text-uppercase">Login to <img id="Home" src="{{ asset ('images/logo.png')}}"></h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session()->has('message'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ Session()->get('message') }}
                            </div>
                        @endif

                        <form action="{{ url('/doLogin')}}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="your-email@gmail.com" id="email">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Your Password" id="password">
                            </div>

                            <div class="d-sm-flex mb-5 align-items-center">
                                <span class="mr-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                                    <div class="control__indicator"></div>
                                </label>
                                <b class="text-center">
                                    <a href="{{ url('/register') }}" class="text-center text-primary">Create an account?</a>
                                </b>
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block py-2 btn-primary">

                            <span class="text-center my-3 d-block">or</span>

                            <div class="">
                                <a href="#" class="btn btn-block py-2 btn-facebook">
                                    <span class="icon-facebook mr-3"></span> Login with facebook
                                </a>
                                <a href="#" class="btn btn-block py-2 btn-google"><span class="icon-google mr-3"></span> Login with Google</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="{{ asset ('login_assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
<script src="{{ asset ('login_assets/js/popper.min.js')}}"></script>
<script src="{{ asset ('login_assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset ('login_assets/js/main.js')}}"></script>
</body>
</html>

