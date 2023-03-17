@extends('layouts.home.app')

@section('content')

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<!-- Page Header Start -->
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Admin Dashboard</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
    </div>
</div>
<!-- Page Header End -->

<style>
 @font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(https://example.com/MaterialIcons-Regular.eot); /* For IE6-8 */
  src: local('Material Icons'),
    local('MaterialIcons-Regular'),
    url(https://example.com/MaterialIcons-Regular.woff2) format('woff2'),
    url(https://example.com/MaterialIcons-Regular.woff) format('woff'),
    url(https://example.com/MaterialIcons-Regular.ttf) format('truetype');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 72px;  /* Preferred icon size */
  display: flex;
  line-height: 1;
  text-transform: none;
  letter-spacing: normal;
  word-wrap: normal;
  white-space: nowrap;
  direction: ltr;
  justify-content: center;
  align-items: center;

  /* Support for all WebKit browsers. */
  -webkit-font-smoothing: antialiased;
  /* Support for Safari and Chrome. */
  text-rendering: optimizeLegibility;

  /* Support for Firefox. */
  -moz-osx-font-smoothing: grayscale;

  /* Support for IE. */
  font-feature-settings: 'liga';
}

.container b{
    font-family:"Times New Roman", Times, serif;
    display:flex;
    flex-wrap: wrap;
}
.card-body{
    display:flex;
}
.icons{
    margin:0 10px;
    display: block;
    justify-content: center; /* center items horizontally, in this case */
    align-items: center;
    margin:auto;
}
body{
    background: linear-gradient(90deg, hsla(16, 100%, 76%, 1) 0%, hsla(49, 100%, 81%, 1) 100%);
}
.card{
    background: linear-gradient(90deg, hsla(298, 68%, 90%, 1) 0%, hsla(30, 82%, 91%, 1) 100%);
}
.card-header{
    background: linear-gradient(90deg, hsla(211, 66%, 87%, 1) 0%, hsla(348, 67%, 88%, 1) 50%, hsla(272, 26%, 72%, 1) 100%);
}
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><p class="h4 mb-0">{{ __('Admin Dashboard') }}</p></div>

                <p class="h4 m-4">Functions</p>
                <div class="card-body">
                    <div class="icons">
                    <span class="material-icons">category</span>
                    <a href="{{ route('insertCategory') }}" class="link-secondary" style="text-decoration:none;">
                        Add Category
                    </a>
                </div>
                    
                <div class="icons">
                    <span class="material-icons">format_size</span>
                   <a href="{{ route('insertSize') }}" class="link-secondary" style="text-decoration:none;">
                        Add Size
                    </a>
                </div>
                    
                <div class="icons">
                    <span class="material-icons"> favorite</span>
                   <a href="{{ route('insertFlavor') }}" class="link-secondary" style="text-decoration:none;">
                        Add Flavor
                    </a> 
                </div>
                    
                </div>

                <p class="h4 mt-2 m-4 mb-2">Product CRUD</p>
                <div class="card-body">
                <div class="icons">
                    <span class="material-icons">add</span>
                    <a href="{{ route('insertProduct') }}" class="link-secondary" style="text-decoration:none;">
                        Create product
                    </a>
                </div>    
                    
                <div class="icons">
                    <span class="material-icons">view_list</span>
                   <a href="{{ route('viewProduct') }}" class="link-secondary" style="text-decoration:none;">
                        Product List - CRUD
                    </a> 
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection