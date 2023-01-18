@extends('layouts.home.app')

@section('content')

<!-- Page Header Start -->
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Create product</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                </nav>
        </div>
    </div>
<!-- Page Header End -->

{{-- Session Message --}}
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

<div class="container">
    <p class="h1">Add product</p>
    <form method="POST" action="{{ route('addProduct') }}"enctype="multipart/form-data">
    @csrf    
    <div class="form-group mb-2">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
    </div> 

    <div class="form-group mb-2">
        <label for="category">Category</label>
        <select name= "category_id" id= "category_id" class="form-control">
            <option hidden value="default">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select> 
    </div>

    <div class="form-group mb-2">
        <label for="size">Size</label>
        <select name= "size_id" id= "size_id" class="form-control">
            <option hidden value="default">Select a size</option>
            @foreach($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select> 
    </div>

    <div class="form-group mb-2">
        <label for="flavor">Flavor</label>
        <select name= "flavor_id" id= "flavor_id" class="form-control">
            <option hidden value="default">Select a flavor</option>
            @foreach($flavors as $flavor)
                <option value="{{ $flavor->id }}">{{ $flavor->name }}</option>
            @endforeach
        </select> 
    </div>

    <div class="form-outline mb-2" style="width: 22rem;">
        <label class="form-label" for="price">Price</label>
        <input type="text" id="price" class="form-control" name="price" placeholder="0.00" required/>
    </div>

    <div class="form-outline mb-2" style="width: 22rem;">
        <label class="form-label" for="quantity">Product Quantity</label>
        <input type="number" id="quantity" class="form-control" name="quantity" required/>
    </div>

    <div class="form-group mb-2">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" rows="3" name="description" maxlength="400" required></textarea>
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
        <img id="frame" class="img-fluid m-1" style="height:200px; width:200px"/>
    </div>

    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="{{route('dashboard')}}" class="btn btn-secondary">Back</a>
    </div>

</form>
</div>

@endsection