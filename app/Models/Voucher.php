<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    } 
    public function contentVoucher(){
        return $this->hasMany(ContentVoucher::class);
    }
    use HasFactory;
}
