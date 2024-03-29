<?php

namespace Database\Factories;

use App\Models\Voucher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voucher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_users' => User::all()->random()->id,
            'total_amount' => $this->faker->randomNumber($nbDigits=5)
        ];
    }
}
