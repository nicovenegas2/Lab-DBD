<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\MethodBank;
use app\Models\Bank;
use app\Models\PaymentMethod;

class MethodBankFactory extends Factory
{
    protected $model = MethodBank::class;

    public function definition()
    {
        protected $model = MethodBank::class;
        return [
            'id_bank' => Bank::all()->random()->id,
            'id_method' => PaymentMethod::all()->random()->id
        ];
    }
}
