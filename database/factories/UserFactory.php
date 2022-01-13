<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $validname = function($name){
            return strlen($name) < 30;
            };
        return [
            'nickname' => $this->faker->valid($validname)->name,
            'name' => $this->faker->valid($validname)->name,
            'email' => $this->faker->valid($validname)->safeEmail,
            'password' => $this->faker->valid($validname)->password,
            'wallet' => $this->faker->randomNumber($nbDigits=6),
            'birthday' => $this->faker->date,
            'id_country' => Country::all()->random()->id
        ];
    }
}
