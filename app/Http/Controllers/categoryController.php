<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function create(){
        return view('admin\insertCategory');
    }

    public function add(Request $request){
        $addCategory= category::create([    //step 3 bind data
            'id'=>$request->ID, //add on 
            'name'=>$request->name, //fullname from HTML
        ]);
        return redirect()->route('insertCategory');// step 5 back to last page       
    }

    public function blank(){

    }
}
