<?php

namespace Database\Factories;

use App\Models\ContentVoucher;
use App\Models\Game;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentVoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContentVoucher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_game' => Game::all()->random()->id,
            'id_voucher' => Voucher::all()->random()->id,
        ];
    }
}
