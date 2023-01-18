<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    public $primaryKey = 'id';
    protected $fillable=['name','flavorID','description','price','image','quantity','categoryID','sizeID'];

    public function category(){
        return $this->belongsTo(category::class,'categoryID');
    }    

    public function size(){
        return $this->belongsTo(size::class,'sizeID');
    }    

    public function flavor(){
        return $this->belongsTo(flavor::class,'flavorID');
    }    
}
