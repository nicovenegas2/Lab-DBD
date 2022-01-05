<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function user_follower(){
        return $this->belongsTo(User::class);
    }

    public function user_followed(){
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
