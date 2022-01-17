<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model = Game::class;
    public function definition()
    {
        return [
            'name'=> $this->faker->word,
            'age_restriction'=> $this->faker->numberBetween($min = 0, $max = 99),
            'requirements'=> $this->faker->text($maxNbChars = 500),
            'sold_units'=> $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'description'=> $this->faker->text($maxNbChars = 1999),
            'demo'=> $this->faker->url,
            'link'=> $this->faker->url,
        ];
    }
}
