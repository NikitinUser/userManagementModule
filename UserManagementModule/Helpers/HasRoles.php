<?php

namespace UserManagementModule\Helpers;

use UserManagementModule\Services\UserService;

class HasRoles
{
    public static function hasRole(int $userId, string $role): bool
    {
        $userService = new UserService();
        return $userService->hasRole($userId, $role);
    }
}
