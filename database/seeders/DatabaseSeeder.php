<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Follower;
use App\Models\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Message::factory(30)->create();
        Follower::factory(20)->create();
    }
}
