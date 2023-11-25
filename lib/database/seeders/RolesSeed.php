<?php
namespace NikitinUser\userManagementModule\lib\database\seeders;

use Illuminate\Database\Seeder;
use NikitinUser\userManagementModule\lib\Models\Role;

class RolesSeed extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $roles = config('user_management.roles');

        foreach ($roles as $role) {
            $existingRole = Role::where('role_name', $role)->first();

            if (empty($existingRole)) {
                Role::create(['role_name' => $role]);
            }
        }
        
    }
}
