<?php
namespace NikitinUser\userManagementModule\Lib\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NikitinUser\userManagementModule\Lib\Services\RoleService;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    private RoleService $roleService;

    public function __construct()
    {
        $this->middleware('role:admin');
        $this->roleService = new RoleService();
    }

    public function allRoles(): JsonResponse
    {
        $roles = $this->roleService->getAllRoles();
        return response()->json($roles);
    }

    public function create(Request $request): JsonResponse
    {
        $roleName = $request->input('roleName');
        $role = $this->roleService->create($roleName);

        return response()->json($role);
    }

    public function update(Request $request)
    {
        $idRole = $request->input("idRole");
        $roleName = $request->input("roleName");

        $this->roleService->updateRole($idRole, $roleName);
    }

    public function delete(Request $request)
    {
        $idRole = (int)$request?->input("idRole");
        $this->roleService->deleteRole($idRole);
    }
}
