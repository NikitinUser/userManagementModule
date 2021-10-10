<?php 
namespace NikitinUser\userManagementModule\lib\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PermissionsForRole extends Model
{
    protected $table = 'permissions_for_role';

    public function getAllRolesAndPermissions()
    {
        $columnsRolesAndPermissions = ['permissions_for_role.id', 'roles.id', 'permissions.id'];
        $columnsRoles = ['roles.id', 'roles.role_name', 'roles.created_at']; 
        $columnsPermissions = ['permissions.id', 'permissions.permission_name', 'permissions.created_at']; 

        $roles = DB::table('roles')
            ->select($columnsRoles);

        $permissions = DB::table('permissions')
                    ->select($columnsPermissions);

        $rolesAndPermissions = $this->select($columnsRolesAndPermissions)
                  ->join('roles', 'permissions_for_role.id_role', '=', 'roles.id')
                  ->join('permissions', 'permissions_for_role.id_permission', '=', 'permissions.id')
                  ->union($roles)
                  ->union($permissions)
                  ->get()
                  ->toArray();

        if (!is_array($rolesAndPermissions))
            return false;

        return $rolesAndPermissions;
    }
}