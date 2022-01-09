<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public function methodBank(){
    return $this->hasMany('app\Models\MethodBank');
    }

    public function user(){
        return $this->belongsTo('app\Models\User');
    }

    use HasFactory;
}
