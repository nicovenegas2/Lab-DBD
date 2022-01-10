<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function gamekind(){
        return $this->hasMany(GameKind::class);
    }
    public function library(){
        return $this->hasMany(Library::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function like(){
        return $this->hasMany(Like::class);
    }
    public function wishlist(){
        return $this->hasMany(WishList::class);
    }
    public function developer(){
        return $this->hasMany(Developer::class);
    }
    public function contentvoucher(){
        return $this->hasMany(ContentVoucher::class);
    }
    public function countrygame(){
        return $this->hasMany(CountryGame::class);
    }
    use HasFactory;
}
