<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MethodBank;
use App\Models\Bank;
use App\Models\PaymentMethod;

class MethodBankFactory extends Factory
{
    protected $model = MethodBank::class;

    public function definition()
    {
        return [
            'id_bank' => Bank::all()->random()->id,
            'id_method' => PaymentMethod::all()->random()->id
        ];
    }
}
