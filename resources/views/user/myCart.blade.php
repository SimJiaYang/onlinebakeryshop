@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">My Cart</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->

@if(Session::has('deleteSuccess')) 
    <div class="alert alert-warning" role="alert">
        {{Session::get('deleteSuccess')}}  
    </div>
    {{session()->forget('deleteSuccess')}} 
@endif 
@if(Session::has('error')) 
<div class="alert alert-danger" role="alert">
    {{Session::get('error')}}  
</div>  
    {{session()->forget('error')}} 
@endif 
@if(Session::has('success'))   
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}  
    </div>
    {{session()->forget('success')}} 
@endif 
@if(Session::has('same'))   
    <div class="alert alert-warning" role="alert">
        {{Session::get('same')}}  
    </div>
    {{session()->forget('same')}} 
@endif 

@if(Session::has('errorPrice'))   
    <div class="alert alert-warning" role="alert">
        {{Session::get('errorPrice')}}  
    </div>
    {{session()->forget('errorPrice')}} 
@endif 

<div class="container">
    <div class="row d-flex justify-content-center">
      
      <div class="col-11">
       <p class="h4">Cart</p> 
          <table class="table table-image table table-bordered">
            <thead>
              <tr>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach($cart as $carts)
            {{-- //Update --}}
            <form class="form-group col-md-4" action="{{ route('updateCart') }}" method="POST">
            @csrf
              <tr>
            {{-- First Comlumn--}}
                <td class="w-25">
                  {{-- Click image to view product details --}}
                  <a href='{{route('productDetails',['id' => $carts->product['id']])}}'> 
                  {{-- Tick to calculate total price --}}
                  <input type="checkbox" name="cid[]" id="cid[]" value="{{$carts->id}}" onclick="cal()">
                  {{-- Subtotal) --}}
                  <input type="hidden" name="subtotal[]" id="subtotal[]" value="{{$carts->product['price']*$carts->quantity}}">
                  {{-- Show image --}}
                    <img src="{{ asset('images/client') }}/{{$carts->product['image']}}" 
                    class="img-fluid img-thumbnail mt-2" alt="Sheep"
                    style="height: 250px; width: 250px;">
                  </a>
                </td>

            {{-- Second and Third Comlumn--}}
                <td>{{ $carts->product['name'] }}</td>
                <td>RM {{ $carts->product['price'] }}</td>

            {{-- Forth Comlumn--}}
                <td>
                  <div class="col-sm-">
                    <input type="number" class="form-control" value="{{$carts->quantity}}" name="quantity" id="quantity">
                  </div>
                </td>

            {{-- Firth Comlumn--}}   
                <td>RM {{ $carts->product['price'] * $carts->quantity}}</td>

            {{-- Sixth Comlumn--}}  
                <td>
                    <input type="hidden" value="{{ $carts->id }}" name="id" id="id">
                    <input type="hidden" value="{{ $carts->product['id'] }}" name="pid" id="pid">
                    <button type="submit" class="btn btn-info" id="update"
                    name="update" >Update</button><br>
                </form>
                    <a href="{{route('deleteCart',['id' => $carts->id])}}" class="btn btn-danger m-1"
                    onClick="return confirm('Are you confirm to delete?')"> Delete </a>
                </td> 
                
              </tr>
            @endforeach

            <script>
            //Calculate the total price
            function cal(){
              var names=document.getElementsByName('subtotal[]');
              var subtotal=0;
              var cboxes=document.getElementsByName('cid[]');
            
              var id = [];
              var len=cboxes.length;
              for(var i=0;i<len;i++){
                 if(cboxes[i].checked){
                      subtotal=parseFloat(names[i].value)+parseFloat(subtotal);
                      id.push(cboxes[i].value);
                  }
              }
              document.getElementById('sub').value=subtotal.toFixed(2);

              document.getElementById('myInput').value = id;
            }
            </script>

            <form action="{{ route('createOrder') }}" method="POST">
              @csrf
            <tr>
                <td colspan="4">
                    <div class="d-flex align-items-center justify-content-end">
                      <p class="h4 mb-0">Delivery Date and Time</p>
                  </div>
                </td>

                <td colspan="2">    
                    <div class="col-md-10">
                      <input type="datetime-local" class="form-control" name="deliveryDate" id="deliveryDate" required>
                    </div>
                </td>
            </tr>

              <tr>
                <td colspan="4">
                    <div class="d-flex align-items-center justify-content-end">
                      <p class="h4 mb-0">Total price</p>
                  </div>
                </td>


              <input type="hidden" id="myInput" name="myInput">
                <td colspan="2"> 
                  <p class="h4 mb-0">      
                    RM: <input type="text" name="sub" id="sub" value="0" size="8" readonly/>
                  </p>
                </td>
              </tr>

              <tr>
                <td colspan="6">
                  <div class="d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-primary m-1">Checkout</button>
                  </div> 
              </tr>
            </form>

            </tbody>
          </table>   
      </div>
  </div>
@endsection