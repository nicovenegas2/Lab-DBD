<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_users' => User::all()->random()->id,
            'id_games' => Game::all()->random()->id
        ];
    }
}
