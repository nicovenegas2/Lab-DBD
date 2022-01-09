<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
    use HasFactory;
}
