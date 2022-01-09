<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Follower;
use Illuminate\Database\Eloquent\Factories\Factory;


class FollowerFactory extends Factory
{
    protected $model = Follower::class;
    public function definition()
    {
        return [
            'id_follower' => User::all()->random()->id,
            'id_followed' => User::all()->random()->id
        ];
    }
}
