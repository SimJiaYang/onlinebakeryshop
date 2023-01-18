<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flavor extends Model
{
    protected $table = 'flavors';
    public $primaryKey = 'id';
    protected $fillable=['name'];
    
    public function product(){
        return $this->hasMany(product::class);
    }
}
