<?php 
namespace NikitinUser\userManagementModule\lib\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionsForRole extends Model
{
    protected $table = 'permissions_for_role';

    public function getAllPermissionsForRoles()
    {
        $columnsRolesAndPermissions = [
            'permissions_for_role.id as id',
            'roles.id as role_id',
            'permissions.id as permis_id'
        ];

        return $this->select($columnsRolesAndPermissions)
            ->rightJoin('roles', 'permissions_for_role.id_role', '=', 'roles.id')
            ->rightJoin('permissions', 'permissions_for_role.id_permission', '=', 'permissions.id')
            ->get()
            ->toArray();
        return $response;
    }

    

    public function addPermissionForRole($role_id, $permission_id)
    {
        $this->insert([
            'id_role' => $role_id,
            'id_permission' => $permission_id
        ]);
    }

    public function removePermissionForRole($role_id, $permission_id)
    {
        $this->where('id_role', '=', $role_id)
             ->where('id_permission', '=', $permission_id)
             ->delete();
    }
}