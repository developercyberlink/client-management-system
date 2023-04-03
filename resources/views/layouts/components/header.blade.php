<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('front/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">

    {{-- toaster css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

    <!-- Searchbox logic -->
    <style>
        body {
          font-family: Arial;
        }
        
        * {
          box-sizing: border-box;
        }
        
        .openBtn {
          background: #f1f1f1;
          border: none;
          padding: 10px 15px;
          font-size: 20px;
          cursor: pointer;
        }
        
        .openBtn:hover {
          background: #bbb;
        }
        
        .overlay {
          height: 100%;
          width: 100%;
          display: none;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0, 0.9);
        }
        
        .overlay-content {
          position: relative;
          top: 46%;
          width: 80%;
          text-align: center;
          margin-top: 30px;
          margin: auto;
        }
        
        .overlay .closebtn {
          position: absolute;
          top: 20px;
          right: 45px;
          font-size: 60px;
          cursor: pointer;
          color: white;
        }
        
        .overlay .closebtn:hover {
          color: #ccc;
        }
        
        .overlay input[type=text] {
          padding: 15px;
          font-size: 17px;
          border: none;
          float: left;
          width: 80%;
          background: white;
        }
        
        .overlay input[type=text]:hover {
          background: #f1f1f1;
        }
        
        .overlay button {
          float: left;
          width: 20%;
          padding: 15px;
          background: #ddd;
          font-size: 17px;
          border: none;
          cursor: pointer;
        }
        
        .overlay button:hover {
          background: #bbb;
        }

        .search-result{
            background: white;
        }
        </style>

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" onclick="openSearch()" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Search box overlay -->
            <div id="myOverlay" class="overlay">
                <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                <div class="overlay-content">
                  <form id="search_form">
                    <input type="text" id="search_bar" oninput="ajaxSearch()" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>

                  <h1>Searches</h1>

                  <div class="search-result">
                    <div class="row" id="search-output">
                        <!--<div class="col-md-3">
                            <h1>Product 1</h1>
                            <img src="https://m.media-amazon.com/images/I/81cg9myC9kL._AC_SX679_.jpg" width="100px;" alt="">
                        </div>
                        <div class="col-md-3">
                            <h1>Product 2</h1>
                            <img src="https://m.media-amazon.com/images/I/81cg9myC9kL._AC_SX679_.jpg" width="100px;" alt="">
                        </div>
                        <div class="col-md-3">
                            <h1>Product 3</h1>
                            <img src="https://m.media-amazon.com/images/I/81cg9myC9kL._AC_SX679_.jpg" width="100px;" alt="">
                        </div>
                        <div class="col-md-3">
                            <h1>Product 4</h1>
                            <img src="https://m.media-amazon.com/images/I/81cg9myC9kL._AC_SX679_.jpg" width="100px;" alt="">
                        </div>-->
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses <i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link active">Home</a>
                            <a href="shop.html" class="nav-item nav-link">Shop</a>
                            <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                            @guest
                            @if (Route::has('login'))
                                <a class="nav-item nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="nav-item nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                            @else
                            <a href="{{route('user.index')}}" class="nav-item nav-link">Dashboard</a>
                            <a class="nav-item nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->