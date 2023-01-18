<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $products = product::where('quantity', '>', 0)->get();
        // $category = category::all();

        // if (Auth::user()){
        //     if (Auth::user()->type == 'admin') {
        //         return view('admin\admin')
        //         ->with('products',$products)
        //         ->with('category',$category);
        //     }    
        // }else {
        //     return view('layouts\home\index')
        //     ->with('products',$products);
        // }
        return view('layouts\home\index')
            ->with('products',$products);
    }

    public function dashboard(){
        return view('admin\admin');
    }

    public function index(){
        $products = product::where('quantity', '>', 0)->get();
        $category = category::all();
        return view('layouts.home.index')
        ->with('products',$products);
    }

    public function about(){
        return view('layouts.home.about');
    }

    public function contact(){
        return view('layouts.home.contact');
    }

    public function product(){
        $products = product::where('quantity', '>', 0)->get();
        return view('layouts.home.product')
        ->with('products',$products);
    }

    public function service(){
        return view('layouts.home.service');
    }

    public function team(){
        return view('layouts.home.team');
    }
    
    public function privacy(){
        return view('layouts.home.privacy');
    }

    public function error(){
        return view('layouts.home.404');
    }
}
