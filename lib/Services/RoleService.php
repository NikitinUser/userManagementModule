<?php 
namespace NikitinUser\userManagementModule\lib\Services;

use NikitinUser\userManagementModule\lib\Models\Role;

class RoleService
{
    private Role $role;

    public function __construct()
    {
        $this->role = new Role();
    }

    public function getAllRoles()
    {
        return $this->role->get();
    }

    public function getRoleById(int $id)
    {
        return $this->role
            ->where("id", $id)
            ->get();
    }
}
