<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\User;
use APP\Models\Cart;
use APP\Models\Area;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_id',
        'status',
        'estimated_time',
        'start_time',
        'end_time',
        'count_products',
        'area_id',
        'area_address',
        'total_price',

    ];

    public function cart(){
        return  $this->belongsTo(Cart::class);
    }


    public function delivery(){
        return  $this->belongsTo(User::class);
    }


    public function area(){
        return  $this->belongsTo(Area::class);
    }





}
