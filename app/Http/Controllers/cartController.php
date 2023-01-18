<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\category;
use App\Models\product;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class cartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id){
        $cart = cart::all()->where('userID',$id)->where('orderID',null);
        return view('user\myCart')
        ->with('cart',$cart);
    }

    public function add(Request $r){
        //Product
        $product = product::find($r->id);  

        //Validate the price
        $valid =  Validator::make($r->all(), [
            'quantity' => 'required|numeric|min:1|max:'.$product->quantity,
        ]);
        if($valid->fails()){
            Session::flash('error','Unvailable quantity, please insert again');
            return redirect()->back();
        }

        //Product out of stock
        if ($product->quantity == 0) {
            Session::flash('zeroProduct', 'The product is out of stock.');
            return redirect()->back();
        }

        //Check the cart is either new or old {Use user id and product to validate}
        $cart = cart::firstOrNew(['productID' => $r->id,'userID' => Auth::id(),'orderID' => null]);
        if ($cart->exists) {
            //If related product was exist in cart, add it and save
            $cart->quantity += $r->quantity;
            $cart->save();
            
            //After add the cart quantity, minus the product stock and save it
            $products = Product::find($r->id);
            $products->quantity -= $r->quantity;
            $products->save(); 

            //Add sucessful session message
            if($products->exists){
                Session::flash('success',"Add to cart successful!");
            }   

        } else {
        // The record doesn't exist, so create a new one
        $addCart = cart::create([
            'quantity'=> $r->quantity,
            'productID' => $r->id,
            'userID' => Auth::id(),
            'dateAdd' => Carbon::today(),
        ]);  

        //After add the cart, minus the product stock and save it
        $products = Product::find($r->id);
        $products->quantity -= $r->quantity;
        $products->save();      

        //Add sucessful session message
        if($addCart->exists){
            Session::flash('success',"Add to cart successful!");
        } 

        }//else end

        return redirect()->back();
    }

    public function delete($id){
        //Delete the cart
        $deleteItem = cart::find($id);
        $deleteItem->delete();
        Session::flash('deleteSuccess',"delete successful!");
        //If the cart deleted, product item will be add back, this implement in cart model
        return redirect()
        ->route('myCart',['id' => Auth::id()]);
    }

    public function updateCart(Request $request)
    {
        //Get the data from form
        $cart = cart::find($request->id);
        $products = Product::find($request->pid);
  
        //Validate the price
        $valid =  Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:1|max:'.$products->quantity+$cart->quantity,
        ]);
        if($valid->fails()){
            Session::flash('error','Unvailable quantity, please insert again');
            return redirect()->back();
        }

        //If update with same quantity...
        if ($request->quantity == $cart->quantity) {
            Session::flash('same',"Same quantity input");
            return redirect()->back();
        }  

        //If bigger add the cart, minus the product stock else....;
        if ($request->quantity < $cart->quantity) {
            $products->quantity +=  $cart->quantity - $request->quantity;
            $cart->quantity = $request->quantity;
            Session::flash('success',"Update successful!");
        } else {
            $products->quantity -= $request->quantity - $cart->quantity;
            $cart->quantity = $request->quantity;
            Session::flash('success',"Update successful!");
        }
        
        //Save the data
        $products->save();
        $cart->save();

        return redirect()
        ->route('myCart',['id' => Auth::id()]);
    }
}
