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

    public function usermethod(){
        return $this->hasMany(UserMethod::class);
    }

    public function user_sender(){
        return $this->hasMany(Message::class);
    }

    public function user_receiver(){
        return $this->hasMany(Message::class);
    }

    public function user_voucher(){
        return $this->hasMany(Voucher::class);
    }

    public function user_library(){
        return $this->hasMany(Library::class);
    }

    public function user_comment(){
        return $this->hasMany(Comment::class);
    }

    public function user_developer(){
        return $this->hasMany(Developer::class);
    }
    
    public function user_like(){
        return $this->hasMany(Like::class);
    }
    use HasFactory;
}
