<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\User;
use APP\Models\CartProduct;
class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
    ];


    public function user(){
        return  $this->belongsTo(User::class);
    }


    public function products(){
        return  $this->hasMany(CartProduct::class);
    }

}
