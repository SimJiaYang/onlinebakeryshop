@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Receipt</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->


<div class="container">
    <div class="row d-flex justify-content-center">
      
      <div class="col-11">
        <a href="{{ route('myOrder') }}" class="btn btn-secondary mb-2">Back</a>
        
            @foreach($order as $orders)
                <p class="h5">Order ID: {{ $orders->id }}</h5>
                <p class="h5">Order Amount: {{ $orders->amount }}</h5>
                <p class="h5">Order Date: {{ $orders->orderDate }}</h5>
                <p class="h5">Address: {{ Auth::user()->address }}</h5>
                <p class="h5">Delivery Date: {{ $orders->deliveryDate }}</h5>
                <p class="h5">Payer: {{ Auth::user()->id }}</h5>
            @endforeach

        <table class="table table-image table table-bordered">

            <thead>
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>

            <tbody>

            
            @foreach($cart as $carts)
              <tr>
            {{-- Comlumn--}}
                <td>{{ $carts->product['name'] }}</td>
                <td>RM {{ $carts->product['price'] }}</td>
                <td>{{ $carts->quantity }}</td>  
                <td>RM {{ $carts->product['price'] * $carts->quantity}}</td>
              </tr>
            @endforeach
              
              <tr>
                <td colspan="3">
                  <div class="d-flex align-items-center justify-content-end">
                      Total Amount
                  </div> 
                </td>  
                <td colspan="6">
                  <div class="d-flex align-items-center justify-content-end">
                      RM {{ $carts->order['amount']}}
                  </div> 
                </td>  
              </tr>
            </tbody>
          </table> 
          <a href="{{ route('generatePDF',['id' => $orders->id])}}" class="btn btn-secondary mb-2">Receipt</a>  
      </div>
  </div>
@endsection