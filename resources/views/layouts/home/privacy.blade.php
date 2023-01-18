@extends('layouts.home.app')
@section('content')
<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Contact us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <a target="blank"class="h5 text-uppercase mb-2" href="{{ asset('bakery/privacypolicy.pdf') }}">Privacy and Policy</a>
                <br><span>Click to view the content</span>
            </div>   

        </div>
    </div>
    <!-- Contact End -->



@endsection