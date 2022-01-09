<?php

namespace Database\Factories;

use App\Models\Kind;
use App\Models\Game;
use App\Models\GameKind;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameKindFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GameKind::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_kind' => Kind::all()->random()->id,
            'id_game' => Game::all()->random()->id,
        ];
    }
}
