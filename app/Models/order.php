<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';
    public $primaryKey = 'id';
    protected $fillable=['orderDate','paymentStatus','deliveryDate','amount','userID'];

    public function product(){
        return $this->belongsTo(product::class,'productID');
    }

    public function User(){
        return $this->belongsTo(user::class,'userID');
    }
}
