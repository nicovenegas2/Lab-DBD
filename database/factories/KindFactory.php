<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KindFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $validname = function($name){
            return strlen($name) < 20;
            };
        return [
            'kind' => $this->faker->valid($validname)->word
        ];
    }
}
