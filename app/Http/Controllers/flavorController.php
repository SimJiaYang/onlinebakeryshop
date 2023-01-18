<?php

namespace App\Http\Controllers;
use App\Models\flavor;
use Illuminate\Http\Request;

class flavorController extends Controller
{
    public function create(){
        return view('admin\insertFlavor');
    }

    public function add(Request $request){
        $addflavor= flavor::create([    //step 3 bind data
            'id'=>$request->ID, //add on 
            'name'=>$request->name, //fullname from HTML
        ]);
        return redirect()->route('insertFlavor');// step 5 back to last page       
    }
}
