@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">My Order</h1>
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
@if(Session::has('failed')) 
    <div class="alert alert-warning" role="alert">
        {{Session::get('failed')}}  
    </div>
    {{session()->forget('failed')}} 
@endif 

<div class="container">
    <div class="row d-flex justify-content-center">
      
      <div class="col-11">
       <p class="h4">My Order</p> 
          <table class="table table-image table table-bordered">
            <thead>
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Order Date</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Pay Action</th>
              </tr>
            </thead>
            <tbody>

            @foreach($myorders as $myOrder)
            {{-- --}}
            <form class="form-group col-md-4" action="" method="POST">
            @csrf
              <tr>
            {{-- Comlumn--}}
                <td>
                    <a href="{{route('orderDetails',['id' => $myOrder->id])}}">
                    {{ $myOrder->id }}
                </td>
                <td>{{ $myOrder->orderDate }}</td>
                <td>RM {{ $myOrder->amount}}</td>
                <td>{{ $myOrder->paymentStatus }}</td>

                <td>
                  @if ($myOrder->paymentStatus == "pending")
                    <a href="{{ route('pay',['id' => $myOrder->id])}}" type="submit" class="btn btn-warning">Payment</a>
                  @else
                    <a href="{{ route('viewReceipt',['id' => $myOrder->id])}}" type="submit" class="btn btn-secondary">Receipt</a>
                  @endif
                    
                </td> 
              </tr>
            </form> 
            @endforeach
              
            </tbody>
          </table>   
      </div>
  </div>
@endsection