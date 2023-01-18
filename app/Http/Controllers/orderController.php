<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class orderController extends Controller
{
   //Create the order
   public function add(Request $r){ 

    if($r->sub == 0){
        Session::flash('errorPrice',"Error price!!");
        return redirect()->route('myCart',['id'=>Auth::user()]);  
    }

    $addOrder = order::create([    
        'amount'=>$r->sub,             
        'paymentStatus'=>'pending',  
        'deliveryDate' => $r->deliveryDate,
        'orderDate' => Carbon::today(),         
        'userID' => Auth::id(),                          
    ]); 
    
    $orderId =  $addOrder->id;
    
    $items = $r->myInput;
    $array = explode(',', $items);
    foreach($array as $item){
        $carts = cart::find($item);
        $carts->orderID = $orderId;
        $carts->save();
    }
    
    Session::flash('success',"Order succesful!");        
    return redirect()->route('myOrder');  
}

public function show(){
    $myorders = order::all()->where('userID',Auth::id());   
    return view('user\myOrder')->with('myorders',$myorders);
}

public function orderDetails($id){
    $cart = cart::all()->where('userID',Auth::id())->where('orderID',$id);
    return view('user\orderDetail')
    ->with('cart',$cart);
}
}
