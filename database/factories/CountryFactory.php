<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

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
            'name' =>$this->faker->valid($validname)->country,
            'coin' => $this->faker->currencyCode
        ];
    }
}
