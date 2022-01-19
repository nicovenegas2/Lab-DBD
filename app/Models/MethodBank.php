<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MethodBank extends Model
{

    public function bank(){
        return $this->belongsTo(bank::class);
    }

    use HasFactory;
}
