<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\cart;
use App\Models\order;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function pdfReport($id)
    {
        $cart=cart::all()->where('userID',Auth::id())->where('orderID',$id);
        $order=order::all()->where('id',$id);
        $pdf = PDF::loadView('user\myPDF',compact('order','cart'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('report.pdf');
    }

    public function view($id){
        $carts=cart::all()->where('userID',Auth::id())->where('orderID',$id);
        $order=order::all()->where('id',$id);
        return view('user\myPDF')
        ->with('cart',$carts)
        ->with('order',$order);
    }
}
