<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\City;
class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'area',
        'city_id'
    ];


    public function city(){
        return  $this->belongsTo(City::class);
    }
}
