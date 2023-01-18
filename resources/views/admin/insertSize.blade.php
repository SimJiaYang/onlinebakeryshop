@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Insert Size</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->

<div class='container'>
    <form method="POST" action="{{ route('addSize') }}">
        @csrf
        <div class="form-group">
          <label for="categoryName"><p class="h4 mb-1">Insert Size</p></label>
          <input type="text" class="form-control mt-1" id="name" placeholder="Size" name="name">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add Size</button>
        <a href="{{route('dashboard')}}" class="btn btn-secondary mt-2">Back</a>
    </form>
</div>
@endsection