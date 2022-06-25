<?php 
namespace NikitinUser\userManagementModule\lib\Services;

use NikitinUser\userManagementModule\lib\Models\Permission;

class PermissionService
{
    private Permission $permission;

    public function __construct()
    {
        $this->permission = new Permission();
    }

    public function getAllPermissions()
    {
        return $this->permission->get();
    }

    public function getPermissionById(int $idPermission)
    {
        return $this->permission
            ->where("id", $idPermission)
            ->first();
    }


    public function addPermission($permissionData)
    {
        return $this->permission->create($permissionData);
    }

    public function updatePermissionNameById(int $idPermission, string $namePermission)
    {
        $this->permission->where('id', $idPermission)
            ->update(['permission_name' => $namePermission]);
    }


    public function deletePermission(int $idPermission)
    {
        $this->permission->where('id', $idPermission)
            ->delete();
    }
}
