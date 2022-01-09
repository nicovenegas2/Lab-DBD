<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function methodbank(){
        return $this->hasMany('App\Models\MethodBank');
    }
    use HasFactory;
}
