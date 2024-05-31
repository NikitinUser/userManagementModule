<?php

namespace UserManagementModule\Services;

use UserManagementModule\Models\RolesForUser;
use UserManagementModule\Services\RoleService;

class UserService
{
    private RoleService $roleService;

    public function __construct()
    {
        $this->roleService = new RoleService();
    }

    /**
     * @return array
     */
    public function getAllUsers(): array
    {
        $columns = ['roles_for_user.id_user', 'roles.role_name'];
        $columns = array_merge($columns, config('user_management.columns'));

        $table = config('user_management.table');
        $primaryKey = config('user_management.primary_key');

        $usersWithRoles = RolesForUser::select($columns)
            ->join($table, 'roles_for_user.id_user', '=', ($table . '.' . $primaryKey))
            ->join('roles', 'roles_for_user.id_role', '=', 'roles.id')
            ->distinct()
            ->get();

        $users = $usersWithRoles->groupBy('id_user')->map(function ($roles, $id_user) {
            return [
                'id_user' => $id_user,
                'email' => $roles[0]->email,
                'created_at' => $roles[0]->created_at,
                'roles' => $roles->pluck('role_name')->toArray(),
            ];
        });
        return $users->toArray();
    }

    /**
     * @param int $id
     * 
     * @return void
     */
    public function deleteUserById(int $id): void
    {
        $modelClass = config('user_management.model');
        $model = new $modelClass();

        $primaryKey = config('user_management.primary_key');

        $model->where($primaryKey, $id)->delete();
    }

    public function hasRole(int $userId, string $role): bool
    {
        $rolesForUser = $this->roleService->getByRoleAndUserId($userId, $role);
        
        return (($rolesForUser['role_name'] ?? '') === $role);
    }
}
