<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function gamekind(){
        return $this->hasMany('App\Models\GameKind');
    }
    public function library(){
        return $this->hasMany('App\Models\Library');
    }
    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }
    public function like(){
        return $this->hasMany('App\Models\Like');
    }
    public function wishlist(){
        return $this->hasMany('App\Models\WishList');
    }
    public function developer(){
        return $this->hasMany('App\Models\Developer');
    }
    public function contentvoucher(){
        return $this->hasMany('App\Models\ContentVoucher');
    }
    public function countrygame(){
        return $this->hasMany('App\Models\CountryGame');
    }
    use HasFactory;
}
