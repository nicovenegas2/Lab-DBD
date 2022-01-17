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
        $games = Game::all()->count();
        $countries = Country::all()->count();
        $gamecountries = CountryGame::all()->count();
        $country = floor($gamecountries/$games)+1;
        $game = $gamecountries % $countries + 1;

        return [
            'id_countries' => $country,
            'id_games' => $game,
            'price' => $this->faker->randomNumber($nbDigits=4)
        ];
    }
}
