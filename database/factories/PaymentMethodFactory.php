<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PaymentMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $validname = function($name){
            return strlen($name) < 100;
            };
        return [
            'name' => $this->faker->valid($validname)->name,
            'id_user' => User::all()->random()->id
            
        ];
    }
}
