<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user_emisor(){
        return $this->belongsTo(User::class);
    }

    public function user_receptor(){
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
