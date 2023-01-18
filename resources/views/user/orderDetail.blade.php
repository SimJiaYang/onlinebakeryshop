@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Order Details</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->

<div class="container">
    <div class="row d-flex justify-content-center">
      
      <div class="col-11">
        <a href="{{route('myOrder')}}" class="btn btn-secondary mb-2">Back</a>
       <p class="h4">Order details</p> 
          <table class="table table-image table table-bordered">
            <thead>
              <tr>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>

            @foreach($cart as $carts)
            <form class="form-group col-md-4">
            @csrf
              <tr>
            {{-- First Comlumn--}}
                <td class="w-25">
                  {{-- Show image --}}
                    <img src="{{ asset('images/client') }}/{{$carts->product['image']}}" 
                    class="img-fluid img-thumbnail mt-2" alt="Sheep"
                    style="height: 250px; width: 250px;">
                </td>

            {{-- Comlumn--}}
                <td>{{ $carts->product['name'] }}</td>
                <td>RM {{ $carts->product['price'] }}</td>
                <td>{{ $carts->quantity }}</td>  
                <td>RM {{ $carts->product['price'] * $carts->quantity}}</td>
              </tr>
            @endforeach
              {{-- <td>RM {{ $carts->order['amount']}}</td> --}}
              <tr>
                <td colspan="4">
                  <div class="d-flex align-items-center justify-content-end">
                      Total Amount
                  </div> 
                <td colspan="6">
                  <div class="d-flex align-items-center justify-content-end">
                      RM {{ $carts->order['amount']}}
                  </div> 
              </tr>

            </tbody>
          </table>   
      </div>
  </div>
@endsection