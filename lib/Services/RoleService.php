<?php 
namespace NikitinUser\userManagementModule\Lib\Services;

use NikitinUser\userManagementModule\Lib\Models\Role;
use NikitinUser\userManagementModule\Lib\Models\RolesForUser;

class RoleService
{
    /**
     * @param string $roleName
     * 
     * @return Role
     */
    public function create(string $roleName): Role
    {
        return Role::create(['role_name' => $roleName]);
    }

    /**
     * @return array
     */
    public function getAllRoles(): array
    {
        return Role::get()->toArray();
    }

    /**
     * @param int $idRole
     * @param string $roleName
     * 
     * @return void
     */
    public function updateRole(int $idRole, string $roleName): void
    {
        Role::where('id', $idRole)->update(['role_name' => $roleName]);
    }

    /**
     * @param int $idRole
     * 
     * @return void
     */
    public function deleteRole(int $idRole): void
    {
        Role::where('id', $idRole)->delete();
    }

    /**
     * @param int $idRole
     * @param int $userId
     * 
     * @return RolesForUser
     */
    public function addRoleForUser(int $idRole, int $userId): RolesForUser
    {
        return RolesForUser::create(
            [
                "id_role" => $idRole,
                "id_user" => $userId,
            ]
        );
    }

    /**
     * @param int $idRole
     * @param int $userId
     * 
     * @return void
     */
    public function removeRoleForUser(int $idRole, int $userId): void
    {
        RolesForUser::where('id_role', '=', $idRole)
            ->where('id_user', '=', $userId)
            ->delete();
    }

    /**
     * @param int $userId
     * @param string $roleName
     * 
     * @return void
     */
    public function getByRoleAndUserId(int $userId, string $roleName): ?array
    {
        return RolesForUser::join('roles', 'roles_for_user.id_role', '=', 'roles.id')
            ->where('id_user', $userId)
            ->where('roles.role_name', $roleName)
            ->first()
            ?->toArray();
    }
}
