<?php

namespace Database\Factories;
use App\Models\Comment;
use App\Models\User;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;


class CommentFactory extends Factory
{
    protected $model = Comment::class;
    public function definition()
    {
        return [
            'id_user' => User::all()->random()->id,
            'id_game' => Game::all()->random()->id,
            'comment'=> $this->faker->text($maxNbChars = 5000),
        ];
    }
}
