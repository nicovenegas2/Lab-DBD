<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function user(){
        return $this->hasMany(User::class);
    }
    public function countryGame(){
        return $this->hasMany(CountryGame::class);
    }
    
    use HasFactory;
}
