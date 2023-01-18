@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Admin Dashboard</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><p class="h4 mb-0">{{ __('Admin Dashboard') }}</p></div>

                <div class="card-body">
                    <p class="h4 mb-1">Functions</p>
                    <a href="{{ route('insertCategory') }}" class="link-secondary" style="text-decoration:none;">
                        <b class="h5 mb-1">Add Category</b>
                    </a>
                    <br>
                    <a href="{{ route('insertSize') }}" class="link-secondary" style="text-decoration:none;">
                        <b class="h5 mb-1">Add Size</b>
                    </a>
                    <br>
                    <a href="{{ route('insertFlavor') }}" class="link-secondary" style="text-decoration:none;">
                        <b class="h5 mb-1">Add Flavor</b>
                    </a>
                </div>

                <div class="card-body">
                    <p class="h4 mb-1">Product CRUD</p>
                    <a href="{{ route('insertProduct') }}" class="link-secondary" style="text-decoration:none;">
                        <b class="h5 mb-1">Create product</b>
                    </a>
                    <br>
                    <a href="{{ route('viewProduct') }}" class="link-secondary" style="text-decoration:none;">
                        <b class="h5 mb-1">View product (Include update and delete product)</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection