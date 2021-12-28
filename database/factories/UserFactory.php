<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
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
            
            'role' => $this->faker->randomElement($array = array ('developer','user','admin')),
            'nickname' => $this->faker->firstName($maxNbChars = 20),
            'name' => $this->faker->valid($validname)->name,
            'email' => $this->faker->safeEmail($maxNbChars = 20),
            'password' => $this->faker->password, // password
            'wallet' => $this->faker->randomNumber($nbDigits=6),
            'ubication' => $this->faker->address($maxNbChars = 20),
            'date_of_birth' => $this->faker->date
            //'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
