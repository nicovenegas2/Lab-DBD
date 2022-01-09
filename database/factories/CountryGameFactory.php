<?php

namespace Database\Factories;

use App\Models\CountryGame;
use App\Models\Country;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryGameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CountryGame::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_countries' => Country::all()->random()->id,
            'id_games' => Game::all()->random()->id,
            'price' => $this->faker->randomNumber($nbDigits=4)
        ];
    }
}
