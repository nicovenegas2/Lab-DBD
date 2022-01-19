<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMethod extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function paymentmethod(){
        return $this->belongsTo(PaymentMethod::class);
    }

    use HasFactory;
}
