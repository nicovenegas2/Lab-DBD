<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    public function gameKind(){
        return $this->hasMany(GameKind::class);
    }
    use HasFactory;
}
