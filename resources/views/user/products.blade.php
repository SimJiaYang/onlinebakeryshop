@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Products</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->

<div class="container">

  <div class="container">
    <p class="h4">Product details</p>
    <form class="form-inline my-lg-0" method="POST" action="{{ route('search') }}">
      @csrf 
      <div class="input-group">
        <div class="col-3">  
          <input class="form-control my-sm-1" type="search" placeholder="Search" aria-label="Search"
          name="name" id="name">
        </div>
        <div class="col-5">
          <button class="btn btn-outline-success my-sm-1 m-1 my-0" type="submit">Search</button>
      </div>
    </form>
  </div> 

    <div class="container">
        <div class="row">
            
    @foreach($products as $product)
          <div class="col-sm-4 mt-2 mb-2 ml-0">
            <div class="card">

            <div class="card-img-top">
                <center>
                <a href='{{route('productDetails',['id' => $product->id])}}' >
                    <img src="{{ asset('images/client') }}/{{$product->image}}"  alt="Product" class="img-fluid mx-auto mt-2"
                    style="height: 250px; width: 250px;">
                </a>
            </center>
            </div>

              <div class="card-body">
                <h5 class="card-title"><b>{{$product->name}}</b></h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Product Price: RM {{$product->price}}</li>
                    <li class="list-group-item">Product Quantity: {{$product->quantity}}</li>
                </ul>
              </div>
            </div>
          </div>  
    @endforeach 
        </div>
    </div>   
</div>                        
@endsection