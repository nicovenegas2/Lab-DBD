<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function rolepermission(){
        return $this->hasMany('app\Models\RolePermission');
    }
    use HasFactory;
}
