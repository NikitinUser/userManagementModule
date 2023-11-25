<?php 
namespace NikitinUser\UserManagementModule\Lib\Helpers;

use NikitinUser\UserManagementModule\Lib\Services\UserService;

class HasRoles
{
    public static function hasRole(int $userId, string $role): bool
    {
        $userService = new UserService();
        return $userService->hasRole($userId, $role);
    }
}
