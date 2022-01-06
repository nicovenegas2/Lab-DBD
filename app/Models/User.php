<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function user_followed(){
        return $this->hasMany(Follower::class);
    }

    public function user_follower(){
        return $this->hasMany(Follower::class);
    }

    public function roleUser(){
        return $this->hasMany(RoleUser::class);
    }

    public function paymentMethod(){
        return $this->hasMany(PaymentMethod::class);
    }

    public function user_sender(){
        return $this->hasMany(Message::class);
    }

    public function user_receiver(){
        return $this->hasMany(Message::class);
    }


    use HasFactory;
}
