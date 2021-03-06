<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Eshop - Ecommerce</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset ('images/favicon.png')}}">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{  asset ('css/bootstrap.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset ('css/magnific-popup.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('css/font-awesome.css')}}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset ('css/jquery.fancybox.min.css')}}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset ('css/themify-icons.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset ('css/niceselect.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset ('css/animate.css')}}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset ('css/flex-slider.min.css')}}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset ('css/owl-carousel.css')}}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset ('css/slicknav.min.css')}}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ asset ('css/reset.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/responsive.css')}}">



</head>
<body class="js">

<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- End Preloader -->


<!-- Header -->
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                            <li><i class="ti-email"></i> support@shophub.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i> Store location</li>
                            <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
                            <li><i class="ti-user"></i> <a href="#">My account</a></li>
                            @if(isset(Auth::user()->name))
                                <li><i class="fa fa-user-circle-o" aria-hidden="true"></i>{{Auth::user()->name}}
                                <li><i class="fa fa-sign-out" aria-hidden="true"></i><a href="{{ url('logout')}}">Logout</a></li>

                                </li>
                            @else
                            <li><i class="ti-power-off"></i><a href="{{url('/login')}}">Login</a></li>
                            <li><i class="ti-power-off"></i><a href="{{url('/register')}}">Register</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset ('images/logo.png')}}" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">

                            <select>

                                <option selected="selected">All Category</option>
                                @foreach ($category as $item)
                                <option>{{ $item->name }}</option>
                                @endforeach
                            </select>

                            <form>
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="#" class="single-icon"><i class="ti-bag"></i>
<<<<<<< Updated upstream
                                @if (isset(Auth::user()->name))
                                <span class="total-count">{{ $cart }}</span></a>
                                @else
                                <span class="total-count">0</span></a>
                                @endif
=======
                                <span class="total-count"><?php isset($cart) ? ($cart) : 0?></span></a>
>>>>>>> Stashed changes
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    @if (isset(Auth::user()->name))
                                    <span>{{ $cart }} Items</span>
                                    @else
                                    <span>0 Items</span>
                                    @endif
                                    <a href="#">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                    @if (isset(Auth::user()->name))
                                    @foreach ($items as $collection)
                                    <li>
                                        <a href="{{ url('delete/'. $collection->c_id )}}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="{{('admin_assets/uploads/product/'.$collection->product_image)}}" alt="#"></a>
                                        <h4><a href="#">{{ $collection->product_title }}</a></h4>
                                        <p class="quantity">1x - <span class="amount">${{ $collection->product_price}}.00</span></p>
                                     </li> 
                                    @endforeach
                                    @else
                                    <li>
                                        <span>Empty</span> 
                                    </li>
                                    @endif
                                </ul>
                                <div class="bottom">
                                    <a href="{{ url('/checkout')}}" class="btn animate">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a href="{{ url('/')}}">Home</a></li>
                                            <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ url('/cart')}}">Cart</a></li>
                                                    <li><a href="{{ url('/checkout')}}">Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a></li>
                                            <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="#">Blog Single Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->

