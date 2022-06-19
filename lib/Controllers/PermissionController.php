<?php
namespace NikitinUser\userManagementModule\lib\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use NikitinUser\userManagementModule\lib\Services\PermissionService;

class PermissionController extends Controller
{
    private PermissionService $permissionService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->permissionService = new PermissionService();
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
        $this->permissionService->addPermission($data);

        return redirect(route("getPageAllRoles"));
    }

    public function editPermission(Request $request)
    {
        $idPermission = (int)$request->input("permission_id");
        $namePermission = $request->input("permission_name");

        $this->permissionService->updatePermissionNameById($idPermission, $namePermission);

        return redirect(route("getPageAllRoles"));
    }

    public function deletePermission(Request $request)
    {
        $idPermission = $request->input("id_permission") ?? 0;
        $this->permissionService->deletePermission($idPermission);

        return true;
    }
}