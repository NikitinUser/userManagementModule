<?php

namespace UserManagementModule\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use UserManagementModule\Services\RoleService;
use UserManagementModule\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserManagementController extends Controller
{
    private RoleService $roleService;
    private UserService $userService;

    public function __construct()
    {
        $this->middleware('role:admin');
        $this->roleService = new RoleService();
        $this->userService = new UserService();
    }

    public function allUsers(): JsonResponse
    {
        $users = $this->userService->getAllUsers();
        return response()->json($users);
    }

    public function removeUser(int $userId)
    {
        $this->userService->deleteUserById($userId);
    }

    public function addRoleForUser(Request $request)
    {
        $roleId = (int)$request->input("id_role");
        $userId = (int)$request->input("id_user");

        $this->roleService->addRoleForUser($roleId, $userId);
    }

    public function removeRoleForUser(Request $request)
    {
        $roleId = (int)$request->input("id_role");
        $userId = (int)$request->input("id_user");

        $this->roleService->removeRoleForUser($roleId, $userId);
    }
}
