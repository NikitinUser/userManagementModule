<?php
namespace NikitinUser\userManagementModule\lib\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPageAllPermissions()
    {
        return view('user-management-module::permission.allPermissions');
    }

    public function getPageAddPermission()
    {
        return view('user-management-module::permission.addPermission');
    }

    public function getPageEditPermission()
    {
        return view('user-management-module::permission.editPermission');
    }

    public function addPermission()
    {
        
    }

    public function editPermission()
    {
        
    }

    public function deletePermission()
    {
        
    }
}