@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Product Details</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->

@if(Session::has('success')) 
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}  
    </div>
    {{session()->forget('success')}} 
@endif 

@if(Session::has('error')) 
<div class="alert alert-danger" role="alert">
    {{Session::get('error')}}  
</div>  
    {{session()->forget('error')}} 
@endif 

@if(Session::has('quantityerror'))         
    <div class="alert alert-warning" role="alert">
        {{Session::get('quantityerror')}}  
    </div>      
        {{session()->forget('quantityerror')}} 
@endif 

@if(Session::has('zeroProduct')) 
<div class="alert alert-danger" role="alert">
    {{Session::get('zeroProduct')}}  
</div>             
    {{session()->forget('zeroProduct')}} 
@endif 

<div class="container">    
    <form action="{{ route('products') }}" method="GET">
        <button class="btn btn-secondary mb-1" type="submit">Back</button>
    </form>  

    @foreach ($products as $product)
    <div class="row">
      <div class="col-sm-3">
        <div class="img">
            <img src="{{ asset('images/client') }}/{{$product->image}}" class="card-img-top img-fluid mx-auto m-1" alt="Product">
        </div>
      </div>
      <div class="col-sm-8">
        <div class="para1">

         <form action="{{ route('addToCart') }}" method="POST">  
            @csrf 
            <input type="hidden" name="id" value="{{$product->id}}" id="id">
            <h1>{{ $product->name }}</h1>
            <p class="h5">Category: {{ $product -> category['name'] }}</p>
            <p class="h5">Flavor: {{ $product -> flavor['name'] }}</p>
            <p class="h5">Size: {{ $product -> size['name'] }}</p>
            <p class="h5">Price: RM {{ $product->price }}</p>
            <p class="h5">Product stock: {{ $product->quantity }}</p>
            
            <div class="form-group row col-sm-12">
                <label class="h5 col-sm-3 mt-1">Select the quantity: </label>
                <div class="col-sm-2">
                    <input type="number" id="quantity" name="quantity" class="form-control mr-0" maxlength="4"/>
                </div>    
            </div>
            <button class="btn btn-info mt-2" type="submit">Add to cart</button>
         </form>

        </div>
      </div>
      <p class="h3 mt-2">Product Description</p>
      <p>{{ $product->description }}</p>
    </div>
    @endforeach

    
</div>
@endsection
