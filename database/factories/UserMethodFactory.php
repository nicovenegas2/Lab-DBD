<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PaymentMethod;

class UserMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => User::all()->random()->id,
            'id_paymentmethod' => PaymentMethod::all()->random()->id,
            'cardnumber' => $this->faker->creditCardNumber,
            'csc' => $this->faker->randomNumber($nbDigits = 3, $strict = true),
            'expiration' => $this->faker->creditCardExpirationDate,
            'cardowner' => $this->faker->name,
            'email' => $this->faker->email
        ];
    }
}
