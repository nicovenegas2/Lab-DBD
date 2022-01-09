<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentVoucher extends Model
{
    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }
    public function game(){
        return $this->belongsTo(Game::class);
    }
    use HasFactory;
}
