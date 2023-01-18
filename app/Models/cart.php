<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'carts';
    public $primaryKey = 'id';
    protected $fillable=['productID','quantity','userID','dateAdd','orderID'];

    public function category(){
        return $this->belongsTo(category::class,'categoryID');
    }

    public function product(){
        return $this->belongsTo(product::class,'productID');
    }

    public function User(){
        return $this->belongsTo(user::class,'userID');
    }

    public function order(){
        return $this->belongsTo(order::class,'orderID');
    }

    //Increase back to the product quantity when the product has been deleted
    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($cartItem) {
            $cartItem->product->increment('quantity', $cartItem->quantity);
        });
    }
}
