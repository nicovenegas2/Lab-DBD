<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Country;
use App\Models\Permission;
use App\Models\Role;
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
        Country::factory(180)->create();
        User::factory(40)->create();
        Role::factory(3)->create();
    }
}
