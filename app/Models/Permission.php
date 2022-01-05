<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function role(){
        return $this->hasMany(Role::class);
    }
    use HasFactory;
}
