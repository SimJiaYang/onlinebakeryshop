<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sweet Treats Bakery</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Favicon -->
    <link href="{{ asset('icon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('bakery/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bakery/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('bakery/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('bakery/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid top-bar bg-dark text-light px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="small text-light" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="small text-light" href="{{ route('privacy') }}">Privacy and Policy</a></li>
                </ol>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn-lg-square text-primary border-end rounded-0" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn-lg-square text-primary border-end rounded-0" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn-lg-square text-primary border-end rounded-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn-lg-square text-primary pe-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn m-0" data-wow-delay="0.1s">
        <a href="{{ route('index') }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0">Sweet Treats Bakery</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                <a href="{{ route('index') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('service') }}" class="nav-item nav-link">Services</a>
                <a href="{{ route('product') }}" class="nav-item nav-link">Products</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>

                <div class="nav-item dropdown">
                    @if(Auth::user())
                        <a class="nav-link dropdown-toggle">
                            {{ Auth::user()->name }}
                        </a>
                    @else
                       <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="dp">Login</a> 
                    @endif

                    <div class="dropdown-menu m-0">
                        <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                        @endif
                    @else

                        @if (Auth::user()->type == "admin") 
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('viewProduct') }}">Product List</a>
                        @endif 

                        @if (Auth::user()->type == "user") 
                            <a class="dropdown-item" href="{{ route('products')}}">Products</a>
                            <a class="dropdown-item" href="{{ route('myCart',['id'=>Auth::Id()])}}">My Cart</a>
                            <a class="dropdown-item" href="{{ route('myOrder')}}">My Order</a>
                        @endif 

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                    @endguest    
                    </div>
                </div>

                
            </div>
            <div class=" d-none d-lg-flex">
                <div class="flex-shrink-0 btn-lg-square border border-light rounded-circle">
                    <i class="fa fa-phone text-primary"></i>
                </div>
                <div class="ps-3">
                    <small class="text-primary mb-0">Call Us</small>
                    <p class="text-light fs-5 mb-0">07-558 6605</p>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <main class="">
        @yield('content')
    </main>

    <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Office Address</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>PTD 64888, Jalan Selatan Utama, KM 15, Off, 
                            Skudai Lbh, 81300 Skudai, Johor</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>07-558 6605</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>secretarial@sc.edu.my</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                        <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                        <a class="btn btn-link" href="{{ route('service') }}">Our Services</a>
                        <a class="btn btn-link" href="{{ route('privacy') }}">Terms & Condition</a>
                        <a class="btn btn-link" href="{{ route('team') }}">Team</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="{{ route('about') }}">About Us</a>
                        <a class="btn btn-link" href="{{ route('contact') }}">Contact Us</a>
                        <a class="btn btn-link" href="{{ route('service') }}">Our Services</a>
                        <a class="btn btn-link" href="{{ route('privacy') }}">Terms & Condition</a>
                        <a class="btn btn-link" href="{{ route('team') }}">Team</a>
                    </div>


                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-light mb-4">Photo Gallery</h4>
                        <div class="row g-2">
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" 
                                src="{{ asset('bakery/img/product-1.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" 
                                src="{{ asset('bakery/img/product-2.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" 
                                src="{{ asset('bakery/img/product-3.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" 
                                src="{{ asset('bakery/img/product-2.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" 
                                src="{{ asset('bakery/img/product-3.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light rounded p-1" 
                                src="{{ asset('bakery/img/product-1.jpg') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    
    
        <!-- Copyright Start -->
        <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Sweet Treats Bakery</a>, All Right Reserved.
                    </div>

                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('bakery/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('bakery/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('bakery/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('bakery/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('bakery/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('bakery/js/main.js') }}"></script>

</body>
 </html>   