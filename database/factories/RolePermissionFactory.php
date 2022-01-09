<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RolePermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_role' => Role::all()->random()->id,
            'id_permission' => Permission::all()->random()->id
        ];
    }
}
