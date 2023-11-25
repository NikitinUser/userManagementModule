<?php 
namespace NikitinUser\userManagementModule\Lib\Helpers;

use NikitinUser\userManagementModule\Lib\Services\UserService;

class HasRoles
{
    public static function hasRole(int $userId, string $role): bool
    {
        $userService = new UserService();
        return $userService->hasRole($userId, $role);
    }
}
