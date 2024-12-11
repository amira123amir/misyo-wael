<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\Category;
use APP\Models\OrderItem;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'size',
        'quantity',
        'color',
        'material',
        'type',
        'price',
        'discount',
        'category_id',
        'image',

    ];

    
    public function category(){
        return  $this->belongsTo(Category::class);
    }

    public function orderItem(){
        return  $this->hasMany(orderItem::class);
    }



}
