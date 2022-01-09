<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryGame extends Model
{
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
 
    use HasFactory;
}
