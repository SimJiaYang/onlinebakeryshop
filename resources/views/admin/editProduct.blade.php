@extends('layouts.home.app')
@section('content')
<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Edit Product</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->

@if(Session::has('error')) 
<div class="alert alert-warning" role="alert">
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

    <div class="container">
    <p class="h1">Edit product</p>

    <form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    {{-- Set cannot Edit --}}
    @foreach($products as $product)

    <div class="form-group mb-2">
        <label for="id">ID</label>
        <input type="hidden" class="form-control" id="id" value="{{ $product->id }}" name="id">
        <input type="text" class="form-control" value="{{ $product->id }}" disabled>
    </div>

    <div class="form-group mb-2">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" value="{{$product->name}}" name="name" required>
    </div> 

    <div class="form-group mb-2">
        <label for="category">Category</label>
        <select name= "category_id" id= "category_id" class="form-control">
            @foreach($categories as $category)
                <option hidden value="{{$product->categoryID}}">{{$product->category['name']}}</option>
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select> 
    </div>

    <div class="form-group mb-2">
        <label for="size">Size</label>
        <select name= "size_id" id= "size_id" class="form-control">
            @foreach($sizes as $size)
                <option hidden value="{{$product->sizeID}}">{{$product->size['name']}}</option>
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select> 
    </div>

    <div class="form-group mb-2">
        <label for="flavor">Flavor</label>
        <select name= "flavor_id" id= "flavor_id" class="form-control">
            @foreach($flavors as $flavor)
            <option hidden value="{{$product->flavorID}}">{{$product->flavor['name']}}</option>
                <option value="{{ $flavor->id }}">{{ $flavor->name }}</option>
            @endforeach
        </select> 
    </div>

    <div class="form-outline mb-2" style="width: 22rem;">
        <label class="form-label" for="price">Price</label>
        <input type="text" id="price" class="form-control" name="price" value="{{$product->price}}" required/>
    </div>

    <div class="form-outline mb-2" style="width: 22rem;">
        <label class="form-label" for="quantity">Product Quantity</label>
        <input type="number" id="quantity" class="form-control" name="quantity" value="{{$product->quantity}}" required/>
    </div>

    <div class="form-group mb-2">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" rows="3" name="description" value="{{$product->description}}" required
            maxlength="400">{{$product->description}}</textarea>
    </div> 

    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
        function clearImage() {
            document.getElementById('formFile').value = null;
            frame.src = "";
        }
    </script>

    <div class="form-group mb-2">
        <label for="Image" class="form-label">Product Image</label>
        <input class="form-control" type="file" id="formFile" name="image" onchange="preview()">
    </div>

    <div class="form-group mb-2">
    <label for="ImagePreview" class="form-label">Product Image Preview</label><br>
        <img id="frame" src="{{ asset('images/client') }}/{{$product->image}}"
        class="img-fluid m-1" style="height:200px; width:200px"/>
    </div>

    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{route('viewProduct')}}" class="btn btn-secondary">Back</a>
    </div>
    @endforeach
    
        </form>
    </div>
@endsection