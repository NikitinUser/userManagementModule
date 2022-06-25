<?php
namespace NikitinUser\userManagementModule\lib\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NikitinUser\userManagementModule\lib\Services\PermissionService;
use NikitinUser\userManagementModule\lib\Services\RolesPermissionsService;

class PermissionController extends Controller
{
    private PermissionService $permissionService;
    private RolesPermissionsService $rolePermissionService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->permissionService = new PermissionService();
        $this->rolePermissionService = new RolesPermissionsService();
    }

    public function getPageAllRolesAndPermissions()
    {
        $data = $this->getAllRolesAndPermission();
        return view('user-management-module::rolesAndPermissions', compact('data'));
    }

    public function getAllRolesAndPermission()
    {
        return $this->rolePermissionService->getPermissionsAndRoles();
    }

    public function getPageAddPermission()
    {
        return view('user-management-module::permission.addPermission');
    }

    public function getPageEditPermission(Request $request)
    {
        $data = $this->getPermissionData($request);

        return view('user-management-module::permission.editPermission', compact('data'));
    }

    public function getPermissionData(Request $request)
    {
        $idPermission = (int)$request->input("permission_id");

        return $this->permissionService->getPermissionById($idPermission);
    }

    public function addPermission(Request $request)
    {
        $data = [];
        $data['permission_name'] = $request?->input('permission_name');
        $permission = $this->permissionService->addPermission($data);

        return json_encode($permission);
    }

    public function editPermission(Request $request)
    {
        $idPermission = (int)$request->input("permission_id");
        $namePermission = $request->input("permission_name");

        $this->permissionService->updatePermissionNameById($idPermission, $namePermission);
    }

    public function deletePermission(Request $request)
    {
        $idPermission = $request->input("id_permission") ?? 0;
        $this->permissionService->deletePermission($idPermission);
    }

    public function addPermissionForRole(Request $request)
    {
        $roleId = $request->input("id_role");
        $permissionId = $request->input("id_permission");

        $this->rolePermissionService->addPermissionForRole($roleId, $permissionId);
    }

    public function removePermissionForRole(Request $request)
    {
        $roleId = $request->input("id_role");
        $permissionId = $request->input("id_permission");

        $this->rolePermissionService->removePermissionForRole($roleId, $permissionId);
    }
}
