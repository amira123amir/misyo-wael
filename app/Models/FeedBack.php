<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\User;
class FeedBack extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'messages',
    ];


    public function user(){
        return  $this->belongsTo(User::class);
    }



}
