<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    public $primaryKey = 'id';
    protected $fillable=['name'];
    
    public function product(){
        return $this->hasMany(product::class);
    }
}
