<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameKind extends Model
{
    public function game(){
        return $this->belongsTo(Game::class);
    }
    public function kind(){
        return $this->belongsTo(kind::class);
    }
    use HasFactory;
}
