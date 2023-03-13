{{-- @extends('layouts.home.app')

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
    <p class="h4">Product</p>
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

  <div class="alert alert-warning m-1 visually-hidden-focusable" role="alert" id="guestLink">
    You need to login to view the product details.
  </div>

  <div class="alert alert-warning m-1 visually-hidden-focusable" role="alert" id="guestLink1">
    Admin please to product list to view product details.
  </div>

    <div class="container">
        <div class="row">
            
    @foreach($products as $product)
          <div class="col-sm-4 mt-2 mb-2 ml-0">
            <div class="card">

            <div class="card-img-top">
                <center>
                @guest
   
                <script>
                    function fun(){ 
                        document.getElementById('guestLink').classList.remove('visually-hidden-focusable');
                    }
                </script>
                    <a href='#' onclick="fun()">
                        <img src="{{ asset('images/client') }}/{{$product->image}}"  alt="Product" class="img-fluid mx-auto mt-2"
                        style="height: 250px; width: 250px;">
                    </a>
                @else        
                    @if (Auth::user()->type == 'user')
                        <a href='{{route('productDetails',['id' => $product->id])}}'>
                            <img src="  alt="Product" class="img-fluid mx-auto mt-2"
                            style="height: 250px; width: 250px;">
                        </a>
                    @else
                    <script>
                        function fun1(){ 
                            document.getElementById('guestLink1').classList.remove('visually-hidden-focusable');
                        }
                    </script>
                        <a href='#' onclick="fun1()">
                            <img src="{{ asset('images/client') }}/{{$product->image}}"  alt="Product" class="img-fluid mx-auto mt-2"
                            style="height: 250px; width: 250px;">
                        </a>    
                    @endif   
                @endguest    
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
@endsection --}}

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

<style>
.productBody{
  margin:0 10%;
  font-family: sans-serif;
  background-color: white;
  display:flex;
  flex-wrap:wrap;
}
h3{
  text-align: center;
  font-size: 30px;
  margin:0;
  padding-top;10px;
}
.gallery{
  display:flex;
  flex-wrap:row wrap;
  justify-content:center;
  align-items:center;
  width:25%;
  margin:40px 0;
}
.content{
  padding:20px;
  margin:15px;
  box-sizing: border-box;
  float:left;
  text-align: center;
  border-radius: 20px;
  cursor: pointer;
  pdding-top:10px;
  box-shadow: 0 15px 30px rgba(0,0,0,0.25),
  0 15px 15px rgba(0,0,0,0.22);
  transition: .4s;
}
.content:hover{
  box-shadow: 0 6px 9px rgba(0,0,0,0.16),
  0 6px 9px rgba(0,0,0,0.23);
  transform: translate(0px,-8px);
}
.img{
  width:100%;
  height:100%;
  text-align:center;
  margin:0 auto;
  display: block;
}
h6{
  font-size:26px;
  text-align: center;
  color:#222f3e;
  margin:5px;
}
button{
  text-align: center;
  font-size: 24px;
  color:#fff;
  width: 100%;
  padding:15px;
  border:0;
  outline:none;
  cursor: pointer;
  margin-top:5px;
  border-bottom-right-radius: 20px;
  border-bottom-left-radius: 20px;
}
h3{
  width:250px;
}
.buy{
  background-color:black;
}
.content a{
  
}
@media(max-width:1500px){
  .gallery{
    width:30%;
  }
}
@media(max-width:1250px){
  .gallery{
    width:50%;
  }
}
@media(max-width:750px){
  .gallery{
    width:100%;
  }
}
</style>

<div class="productBody">

  <div class="alert alert-warning m-1 visually-hidden-focusable" role="alert" id="guestLink">
    You need to login first
  </div>

  <div class="alert alert-warning m-1 visually-hidden-focusable" role="alert" id="guestLink1">
    Admin please to product list to view product details.
  </div>

  @foreach($products as $product)
  <div class="gallery">
    <div class="content">
      <img src="{{ asset('images/client') }}/{{$product->image}}">
      <h3>{{ $product -> name}}</h3>
      <h6>RM {{$product->price}}</h6>

      @guest
      {{-- <button class="buy">Buy</button> --}}
      @else
        @if (Auth::user()->type == 'user')
        <button class="buy">
        <a  href="{{route('productDetails',['id' => $product->id])}}">Buy</a>
        </button>
        @else
      @endif   
      @endguest
    </div>
  </div>
  @endforeach

</div>  


@endsection