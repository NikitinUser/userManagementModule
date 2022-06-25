<?php 
namespace NikitinUser\userManagementModule\lib\Services;

use NikitinUser\userManagementModule\lib\Models\UserManagement;
use NikitinUser\userManagementModule\lib\Services\RoleService;

class UserService
{
    private UserManagement $user;
    private RoleService $roleService;

    public function __construct()
    {
        $this->user = new UserManagement();
        $this->roleService = new RoleService();
    }

    public function getAllUsersWithRoles(): array
    {
        $data = [];

        $data['roles_for_user'] = $this->roleService->getAllRolesForUsers();
        $data['users'] = $this->getAllUsers();
        $data['roles'] = $this->roleService->getAllRoles();

        return $data;
    }

    public function getAllUsers()
    {
        return $this->user->getAll();
    }

    public function getUserById(int $userId)
    {
        return $this->user
            ->where("id", $userId)
            ->first();
    }

    public function deleteUserById(int $userId): void
    {
        $userEntity = $this->getUserById($userId);
        $userEntity->delete();
    }
}
