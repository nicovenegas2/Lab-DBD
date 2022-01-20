<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Role;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_sender' => User::all()->random()->id,
            'id_receiver' => Role::all()->random()->id,
            'content' => $this->faker->text($maxNbChars = 500),
            'date' => $this->faker->date
        ];
    }
}
