<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\User;
use Illuminate\Support\Str;
use APP\Models\Area;
class Order extends Model
{
    use HasFactory;


    protected static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }



















    protected $fillable = [
        'title',
        'user_id',
        'delivery_id',
        'status',
        'estimated_time',
        'start_time',
        'end_time',
        'count_products',
        'area_id',
        'area_address',
        'total_price',

    ];

    public function customer(){
        return  $this->belongsTo(User::class);
    }


    public function delivery(){
        return  $this->belongsTo(User::class);
    }


    public function area(){
        return  $this->belongsTo(Area::class);
    }





}
