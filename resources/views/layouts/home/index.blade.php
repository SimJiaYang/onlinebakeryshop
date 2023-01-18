@extends('layouts.home.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="bakery/img/carousel-3.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">Sweet Treats Bakery</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">We Bake With Passion</h1>
                                <p class="text-light fs-5 mb-4 pb-3">
                                    We bake with passion to ensure that every pastry, cake, and bread is made with care and attention to detail. 
                                    Our goal is to create delicious and visually stunning treats that are sure to impress. Whether it's a simple loaf of bread or a multi-tiered wedding cake, 
                                    we put our heart and soul into every recipe to make sure it's the best it can be.
                                </p>
                                {{-- <a href="" class="btn btn-primary rounded-pill py-3 px-5">Read More</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="bakery/img/carousel-4.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">Sweet Treats Bakery</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">We Bake With Skillful</h1>
                                <p class="text-light fs-5 mb-4 pb-3">
                                    Introducing our bakery shop, where every pastry, cake, and bread is made with skillful precision and passion. 
                                    We take pride in using only the freshest ingredients and our bakers are dedicated to creating delicious and visually stunning treats that are sure to impress. 
                                    From classic croissants to custom-designed cakes, we have something for everyone. Come visit us and taste the difference that passion and skill make in our baked goods.
                                </p>
                                {{-- <a href="" class="btn btn-primary rounded-pill py-3 px-5">Read More</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Facts Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-certificate fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Years Experience</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">20</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-users fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Skilled Professionals</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">100</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-bread-slice fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Total Products</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">30</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.7s">
                    <div class="fact-item bg-light rounded text-center h-100 p-5">
                        <i class="fa fa-cart-plus fa-4x text-primary mb-4"></i>
                        <p class="mb-2">Order Everyday</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">5050</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- About Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="{{ asset('bakery/img/about-4.jpg') }}" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="{{ asset('bakery/img/about-5.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">About Us</p>
                        <h1 class="display-6 mb-4">We Bake Every Item From The Core Of Our Hearts</h1>
                        <p>
                            We bake every item with the core of our hearts, 
                            ensuring that every bite is made with love and care. 
                            Our bakers are passionate about their craft and take great pride 
                            in creating delicious treats that will delight your taste buds. 
                            We use only the freshest ingredients and traditional baking techniques to 
                            bring you the best in flavor and quality. 
                            Whether you're looking for a simple loaf of bread or a custom-designed cake for a special occasion, 
                            we promise to put our hearts into every recipe to make sure it's the best it can be. 
                            Come visit us and experience the love and care that goes into every bite.
                        </p>
                        
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Quality Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Custom Products
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Online Order
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Home Delivery
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('about') }}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Product Start -->
    <div class="container-xxl bg-light my-6 py-6 pt-0">
        <div class="container">
            <div class="bg-primary text-light rounded-bottom p-5 my-6 mt-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 text-light mb-0">Sweet Treats Bakery In Your City</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="d-inline-flex align-items-center text-start">
                            <i class="fa fa-phone-alt fa-4x flex-shrink-0"></i>
                            <div class="ms-4">
                                <p class="fs-5 fw-bold mb-0">Call Us</p>
                                <p class="fs-1 fw-bold mb-0">+07-558 6605</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Bakery Products</p>
                <h1 class="display-6 mb-4">Explore The Categories Of Our Bakery Products</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">

                    <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <div class="text-center p-4">
                            <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">RM9- RM150</div>
                            <h3 class="mb-3">Cake</h3>
                            <span>Topped with crushed pecans and drizzled with chocolate ganache.</span>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{ asset('bakery/img/product-1.jpg') }}" alt="">
                            <div class="product-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href="{{ route('cakeCategory') }}">
                                    <i class="fa fa-eye text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <div class="text-center p-4">
                            <div class="d-inline-block border border-primary rounded-pill pt-1 px-3 mb-3">RM10 - RM99</div>
                            <h3 class="mb-3">Bread</h3>
                            <span>Freshly baked whole wheat bread with a soft, fluffy texture.</span>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{ asset('bakery/img/product-2.jpg') }}" alt="">
                            <div class="product-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href="{{ route('breadCategory') }}">
                                    <i class="fa fa-eye text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <div class="text-center p-4">
                            <div class="d-inline-block border border-primary rounded-pill pt-1 px-3 mb-3">RM5 - RM99</div>
                            <h4 class="mb-3">Cookies</h4>
                            <span>Chewy chocolate chip cookies, homemade goodness</span>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="{{ asset('bakery/img/product-3.jpg') }}" alt="">
                            <div class="product-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href="{{ route('cookiesCategory') }}">
                                    <i class="fa fa-eye text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->


    <!-- Service Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="text-primary text-uppercase mb-2">Our Services</p>
                    <h1 class="display-6 mb-4">What Can We Offer For You?</h1>
                    <p class="mb-5">
                        "We take pride in using only the freshest and highest quality ingredients in all of our baked goods. 
                        Our skilled bakers put care and passion into every single pastry, cake and bread that leaves our kitchen. 
                        We are dedicated to providing our customers with delicious, beautiful and satisfying desserts 
                        that they can enjoy with friends and family."
                    </p>
                    <div class="row gy-5 gx-4">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-bread-slice text-white"></i>
                                </div>
                                <h5 class="mb-0">Quality Products</h5>
                            </div>
                            <span>We use only the finest flour, sugar, butter, 
                                and eggs to ensure that our products are of the highest quality and taste.</span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-birthday-cake text-white"></i>
                                </div>
                                <h5 class="mb-0">Custom Products</h5>
                            </div>
                            <span>Our bakery specializes in custom cakes and desserts for all occasions. 
                                </span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-cart-plus text-white"></i>
                                </div>
                                <h5 class="mb-0">Online Order</h5>
                            </div>
                            <span>Ordering from our bakery is easy and convenient. 
                                You can browse our selection of baked goods online and place your order with just a few clicks</span>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle me-3">
                                    <i class="fa fa-truck text-white"></i>
                                </div>
                                <h5 class="mb-0">Home Delivery</h5>
                            </div>
                            <span>Enjoy the taste of freshly baked goods from the comfort of 
                                your own home with our home delivery service.</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="{{ asset('bakery/img/service-1.jpg') }}" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="{{ asset('bakery/img/service-2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Team Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Our Team</p>
                <h1 class="display-6 mb-4">We're Super Professional At Our Skills</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="{{ asset('bakery/img/team-1.jpg') }}" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Lead Baker <br>Rachel Williams </h5>
                                <span>Breads, Pastries</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="{{ asset('bakery/img/team-2.jpg') }}" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Head Pastry Chef <br>Michael Johnson</h5>
                                <span>Cookies</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="{{ asset('bakery/img/team-3.jpg') }}" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Master Pastry Chef <br>Samantha Brown</h5>
                                <span>Cakes</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="{{ asset('bakery/img/team-4.jpg') }}" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5>Head Baker <br>John Smith</h5>
                                <span>Bread</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl bg-light my-6 py-6 pb-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Client's Review</p>
                <h1 class="display-6 mb-4">More Than 3000++ Customers Trusted Us</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="{{ asset('bakery/img/cl-jy.jpeg') }}" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Sim Jia Yang</h5>
                            <span>Software Engineer</span>
                        </div>
                    </div>
                    <p class="mb-0">
                        "The bakery bread was absolutely delicious! The crust was perfectly crispy and the inside was soft and fluffy. 
                        The flavors were well balanced and it had a great aroma. Highly recommend."
                    </p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="{{ asset('bakery/img/cl-sk.jpg') }}" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1"></h5>
                            <h5 class="mb-1">Tan Shan Ke</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                    <p class="mb-0">"I had the pleasure of trying one of the cakes from this bakery and it was truly a delight. 
                        The cake was moist and fluffy, with a rich and decadent flavor.</p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="{{ asset('bakery/img/cl-xq.jpg') }}" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1"></h5>
                            <h5 class="mb-1">Lee Xiao Qi</h5>
                            <span>Professor Lee</span>
                        </div>
                    </div>
                    <p class="mb-0">
                        "The bakery cookies were a real treat! They were perfectly crisp on the outside and soft on the inside. 
                        The flavors were well balanced and really satisfying."
                    </p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="{{ asset('bakery/img/cl-jj.jpg') }}" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Leong Jun Jie</h5>
                            <span>Google Technical Consultant</span>
                        </div>
                    </div>
                    <p class="mb-0">"I had the pleasure of trying one of the cakes from this bakery and it was truly a delight. 
                        The cake was moist and fluffy, with a rich and decadent flavor.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

@endsection