<?php

namespace Database\Factories;

use App\Models\WishList;
use App\Models\User;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishListFactory extends Factory
{
    protected $model = WishList::class;
    public function definition()
    {
        return [
            'id_user' => User::all()->random()->id,
            'id_game' => Game::all()->random()->id,
        ];
    }
}
