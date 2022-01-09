<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Country;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Message;
use App\Models\PaymentMethod;
use App\Models\Follower;
use App\Models\RoleUser;
use App\Models\Bank;
use App\Models\MethodBank;
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
        Permission::factory(10)->create();
        Country::factory(10)->create();
        User::factory(40)->create();
        Role::factory(3)->create();
        Message::factory(10)->create();
        PaymentMethod::factory(5)->create();
        Follower::factory(10)->create();
        RoleUser::factory(10)->create();
        // MethodBank::factory(10)->create();

    }
}
