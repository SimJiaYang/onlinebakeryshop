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
.buy .txt{
  color: #fff;
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

//For Search bar
.searchBody{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  display:flex;
}

.box{
  display: flex;
  align-items: center;
  justify-content: center;
}

.box input{
  position: relative;
  display: inline-block;
  font-size: 20px;
  box-sizing: border-box;
  transition: .5s;
}

.box .name{
  background: #efe1ce;
  width:300px;
  height:50px;
  border:none;
  outline:none;
  padding: 0 25px;
  border-radius: 25px 0 0 25px;
}

input[type="submit"]{
  text-align: center;
  position: relative;
  left:-4px;
  border-radius: 0 25px 25px 0;
  width:100px;
  height:50px;
  border: none;
  outline: none;
  cursor: pointer;
  color:black;
  background: #ffc107;
}

input[type="submit"]:hover{
  background: #ff5722;
}

</style>

  <div class="alert alert-warning visually-hidden-focusable" role="alert" id="guestLink">
    You need to login to view the product details.
  </div>

  @guest
    
  @else  
  @if (Auth::user()->type == 'admin')
    <div class="alert alert-warning" role="alert" id="guestLink">
      Click the product image to edit it.
    </div>
  @endif
  @endguest

  @if(Session::has('notFound')) 
    <div class="alert alert-warning mt-1" role="alert">
        {{Session::get('notFound')}}  
    </div>
    {{session()->forget('notFound')}} 
  @endif 

  {{-- //search bar --}}
  <div class="searchBody">
    <div class="box">
      <form method="POST" action="{{ route('search') }}">
        @csrf 
        <input type="text" class="name" id="name" name="name" placeholder="Product name...">
        <input class="searchBar" type="submit" value="Submit"></input>
      </form>
    </div> 
  </div>   


<div class="productBody">

  @foreach($products as $product)
  <div class="gallery">
    <div class="content">
      
      @guest
      <script>
        function fun(){ 
            document.getElementById('guestLink').classList.remove('visually-hidden-focusable');
        }
      </script>
      <a href='#' onclick="fun()">
      @else
        <a href="{{route('editProduct',['id' => $product->id])}}">
      @endguest
        <img src="{{ asset('images/client') }}/{{$product->image}}">
      </a>
      <h3>{{ $product -> name}}</h3>
      <h6>RM {{$product->price}}</h6>

      @guest
      {{-- <button class="buy">Buy</button> --}}
      @else
        @if (Auth::user()->type == 'user')
        <button class="buy">
          <a class="txt" href="{{route('productDetails',['id' => $product->id])}}">View</a>
        </button>
        @else
      @endif   
      @endguest
    </div>
  </div>
  @endforeach

</div>  


@endsection