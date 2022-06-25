<?php
namespace NikitinUser\userManagementModule\lib\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NikitinUser\userManagementModule\lib\Services\RoleService;
use NikitinUser\userManagementModule\lib\Services\UserService;

class RoleController extends Controller
{
    private RoleService $roleService;
    private UserService $userService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->roleService = new RoleService();
        $this->userService = new UserService();
    }

    public function getPageUsersRoles()
    {
        $data = $this->getRolesForUser();

        return view('user-management-module::role.usersRoles', compact('data'));
    }

    public function getRolesForUser()
    {
        return $this->userService
            ->getAllUsersWithRoles();
    }

    public function getPageAddRole()
    {
        return view('user-management-module::role.addRole');
    }

    public function getPageEditRole(Request $request)
    {
        $data = $this->getRoleData($request);

        return view('user-management-module::role.editRole', compact('data'));
    }

    public function getRoleData(Request $request)
    {
        $idRole = (int)$request->input("role_id");
        
        return $this->roleService->getRoleById($idRole);
    }

    public function addRole(Request $request)
    {
        $data = [];
        $data['role_name'] = $request?->input('role_name');
        $role = $this->roleService->addRole($data);

        return json_encode($role);
    }

    public function editRole(Request $request)
    {
        $idRole = $request->input("role_id");
        $nameRole = $request->input("role_name");

        $this->roleService->updateRole($idRole, $nameRole);
    }

    public function deleteRole(Request $request)
    {
        $roleId = $request->input("id_role") ?? 0;
        $this->roleService->deleteRole($roleId);
    }
}
