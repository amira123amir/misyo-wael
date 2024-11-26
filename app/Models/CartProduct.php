<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\Cart;
use APP\Models\Product;
class CartProduct extends Model
{
    use HasFactory;
    protected $table='cart_product';
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'total',
    ];

    public function cart(){
        return  $this->belongsTo(Cart::class,'cart_id');
    }

    public function product(){
        return  $this->belongsTo(Product::class,'product_id');
    }

    
}
