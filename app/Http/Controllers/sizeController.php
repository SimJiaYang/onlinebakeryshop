<?php

namespace App\Http\Controllers;
use App\Models\size;
use Illuminate\Http\Request;

class sizeController extends Controller
{
    public function create(){
        return view('admin\insertSize');
    }

    public function add(Request $request){
        $addSize= size::create([    //step 3 bind data
            'id'=>$request->ID, //add on 
            'name'=>$request->name, //fullname from HTML
        ]);
        return redirect()->route('insertSize');// step 5 back to last page       
    }
}
