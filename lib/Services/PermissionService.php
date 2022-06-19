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
            ->get();
    }


    public function addPermission($permissionData)
    {
        $this->permission->insert($permissionData);
    }

    public function updatePermissionNameById(int $idPermission, string $namePermission)
    {
        $this->where('id', $idPermission)
            ->update(['permission_name' => $namePermission]);
    }


    public function deletePermission(int $idPermission)
    {
        // DB::table('permissions_for_role')
        //         ->where('id_permission', '=', $idPermission)
        //         ->delete();

        // $this->where('id', $idPermission)->delete();
    }
}
