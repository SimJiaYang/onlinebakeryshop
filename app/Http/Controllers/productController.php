<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\product;
use App\Models\size;
use App\Models\flavor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    public function create(){
        return view('admin\insertProduct') 
        ->with('categories',category::all())
        ->with('sizes',size::all())
        ->with('flavors',flavor::all());
    }

    public function add(Request $r){
        //Validate the product price
        $valid =  Validator::make($r->all(), [
            'price' => 'required|numeric|between:0,99999.99',
        ]);
        if($valid->fails()){
            Session::flash('error','Unvailable price, please insert again');
            return redirect()->back();
        }
        
        //Handle Photo
        if($r->file('image')!=''){
            $image=$r->file('image');        
            $image->move('images/client',$image->getClientOriginalName());   //images is the location                
            $imageName=$image->getClientOriginalName(); 
        }else{
            $imageName= "cake.jpg";
        }

        //Create product
        $addProduct= product::create([
            'id'=>$r->ID, 
            'name'=>$r->name, 
            'description'=>$r->description,
            'price'=>$r->price,
            'quantity'=>$r->quantity,
            'image'=>$imageName,
            'sizeID' => $r->size_id,
            'flavorID' => $r->flavor_id,
            'categoryID' => $r->category_id,
        ]);    

        if($addProduct->exists){
            Session::flash('success',"Product create successful!");
            return redirect() -> route('insertProduct');
        }    
                
    }

    //Admin 
    public function view(){
        $products = product::all();
        return view('admin\viewProduct')
        ->with('products',$products);
    }

    //Edit
    public function edit($id){
        $products = product::all()->where('id',$id);
        return view('admin\editProduct')
        ->with('products',$products)              
        ->with('categories',Category::all())
        ->with('sizes',size::all())
        ->with('flavors',flavor::all());
    }

    //Update
    public function update(Request $r){
        $products = product::find($r->id);

        //Validate the form data
        $valid =  Validator::make($r->all(), [
            'price' => 'required|numeric|between:0,99999.99',
        ]);
        if($valid->fails()){
            Session::flash('error','unvailable price, please insert again');
            return redirect()->back();
        }
        
        //Check image file
        if($r->file('image')!=''){
            $image=$r->file('image');        
            $image->move('images/client',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $products->image=$imageName;
        }  

        //Name get from form
        $products->name=$r->name;
        $products->description=$r->description;
        $products->price=$r->price;
        $products->quantity=$r->quantity;
        $products->categoryID=$r->category_id;
        $products->sizeID=$r->size_id;
        $products->flavorID=$r->flavor_id;
        $products->save();

        Session::flash('success',"Product update successful!");
        return redirect() -> route('viewProduct');
    }

    public function delete($id){
        $products = product::find($id);
        $products->delete();
        return redirect()->route('viewProduct');
    }

    public function searchByAdmin(Request $r){
        $keyword = $r->name;
        $products = product::where('name', 'like', "%$keyword%")
        ->get();
        return view('admin\viewProduct')
        ->with('products',$products);
    }

    // users
    public function products(){
        $products = product::where('quantity', '>', 0)->get();
        return view('user\products')
        ->with('products',$products);
    }

    public function search(Request $r){
        $keyword = $r->name;
        $products = product::where('name', 'like', "%$keyword%")
        ->get();

        return view('layouts\home\product')
        ->with('products',$products);
    }

    public function productDetails($id){
        $products = product::all()->where('id',$id);
        return view('user\productDetails')
        ->with('products',$products);
    }


    public function cakeCategory(){
        $products = product::all()->where('categoryID','1');
        return view('user\products')
        ->with('products',$products);
    }

    public function breadCategory(){
        $products = product::all()->where('categoryID','2');
        return view('user\products')
        ->with('products',$products);
    }

    public function cookiesCategory(){
        $products = product::all()->where('categoryID','3');
        return view('user\products')
        ->with('products',$products);
    }
}
