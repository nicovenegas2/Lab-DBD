<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankFactory extends Factory
{
    protected $model = Bank::class;
    public function definition()
    {
        return [
            'name'=> $this->faker->company,
        ];
    }
}
