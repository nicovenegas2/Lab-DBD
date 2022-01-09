<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RolePermission;
use App\Models\Role;
use App\Models\Permission;
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
