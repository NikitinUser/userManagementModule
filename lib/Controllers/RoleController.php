<?php
namespace NikitinUser\userManagementModule\lib\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use NikitinUser\userManagementModule\lib\Models\PermissionsForRole;
use NikitinUser\userManagementModule\lib\Models\Role;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->middleware('auth');
        $this->role = $role;
    }

    public function getPageAllRoles()
    {
        $pfr = new PermissionsForRole();
        $data = $pfr->getAllRolesAndPermissions();
        //dd($data);
        
        return view('user-management-module::role.allRoles', compact('data'));
    }

    public function getPageAddRole()
    {
        return view('user-management-module::role.addRole');
    }

    public function getPageEditRole()
    {
        return view('user-management-module::role.editRole');
    }

    public function addRole(Request $request)
    {
        $data = [];
        $data['role_name'] = $request?->input('role_name');
        $this->role->addRole($data);

        return redirect(route("getPageAllRoles"));
    }

    public function editRole()
    {
        
    }

    public function deleteRole(Request $request)
    {
        $roleId = $request->input("id_role") ?? 0;
        $this->role->deleteRole($roleId);

        return true;
    }

    public function addPermissionForRole(Request $request)
    {
        $role_id = $request->input("id_role");
        $permission_id = $request->input("id_permission");

        $pfr = new PermissionsForRole();
        $data = $pfr->addPermissionForRole($role_id, $permission_id);

        return true;
    }

    public function removePermissionForRole(Request $request)
    {
        $role_id = $request->input("id_role");
        $permission_id = $request->input("id_permission");

        $pfr = new PermissionsForRole();
        $data = $pfr->removePermissionForRole($role_id, $permission_id);

        return true;
    }
}