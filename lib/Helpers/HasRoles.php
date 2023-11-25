<?php 
namespace NikitinUser\userManagementModule\lib\Helpers;

use NikitinUser\userManagementModule\lib\Services\UserService;

class HasRoles
{
    public static function hasRole(int $userId, string $role): bool
    {
        $userService = new UserService();
        return $userService->hasRole($userId, $role);
    }
}
