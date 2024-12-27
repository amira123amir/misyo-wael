<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use APP\Models\Order;
use Illuminate\Support\Str;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected static function booted()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }













    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
         'active',
         'blocked',
         'image',
         'city',
         
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];




     public function orders(){
        return  $this->hasMany(Order::class);
    }

    public function feedBacks(){
        return  $this->hasMany(FeedBack::class);
    }







}
