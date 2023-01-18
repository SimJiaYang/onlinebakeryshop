@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">View Product</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->

<div class="container">
    <div class="row">
      
    <div class="container">
        
        <form class="form-inline my-2 my-lg-0" method="POST" action="{{route('searchByAdmin')}}">
            <p class="h4 mb-0 mr-1">Product List</p>
            @csrf 
            <div class="input-group">
              <div class="col-3">  
                <input class="form-control my-sm-2" type="search" placeholder="Search" aria-label="Search"
                name="name" id="name">
              </div>
              <div class="col-3">
                <button class="btn btn-outline-success my-sm-2 m-1" type="submit">Search</button>
              </div>
            </div>
          </form>
    </div>

      <div class="col-12">
          <table class="table table-image table table-bordered">
            <thead>
              <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Flavor</th>
                <th scope="col">Size</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
              <tr>
                <th scope="row">{{$product->id}}</th>
                <td class="col-md-3">
                  {{-- <a href='{{route('productDetails',['id' => $product->id])}}'> --}}
                    <img src="{{ asset('images/client') }}/{{$product->image}}" class="img-fluid"
                    style="height:250px; width:250px">
                  {{-- </a> --}}
                </td>
                <td>{{$product->name}}</td>
                <td>RM {{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category['name']}}</td>
                <td>{{$product->flavor['name']}}</td>
                <td>{{$product->size['name']}}</td>
                <td>
                    {{-- Edit --}}
                    <a href="{{route('editProduct',['id' => $product->id])}}" class="btn btn-secondary m-1">Edit</a>
                    {{-- Delete--}}
                    <br><a onclick="return confirm('Sure Want Delete?')"
                    href="{{route('deleteProduct',['id' => $product->id])}}" class="btn btn-danger m-1"> Delete </a>
                </td>
              </tr>
            @endforeach

            </tbody>
          </table> 
          <a href="{{route('dashboard')}}" class="btn btn-secondary">Back</a>  
      </div>
    </div>
  </div>
@endsection