<?php
namespace NikitinUser\userManagementModule\lib\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPageAllRoles()
    {
        return view('user-management-module::allRoles');
    }

    public function getPageAddRole()
    {
        return view('user-management-module::addRole');
    }

    public function getPageEditRole()
    {
        return view('user-management-module::editRole');
    }

    public function addRole()
    {
        
    }

    public function editRole()
    {
        
    }

    public function daleteRole()
    {
        
    }

    public function changePermissionRole()
    {
        
    }
}