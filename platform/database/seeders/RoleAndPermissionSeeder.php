<?php

namespace Database\Seeders;

use App\Services\RolesAndPermissionsService\RolesAndPermissionsService;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(RolesAndPermissionsService $rolesAndPermissionsService)
    {
        array_map(function ($role) {
            Role::firstOrCreate(['name' => $role]);
        }, $rolesAndPermissionsService->roles);
    }
}
