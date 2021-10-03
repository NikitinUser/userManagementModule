<?php
namespace NikitinUser\userManagementModule\lib\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPageAllUsers()
    {
        return view('user-management-module::user.allUsers');
    }

    public function getPageAddUser()
    {
        return view('user-management-module::user.addNewUser');
    }

    public function getPageUserInfo()
    {
        return view('user-management-module::user.userInfo');
    }

    public function addUser()
    {
        
    }

    public function removeUser()
    {
        
    }

    public function changeRoleUser()
    {
        
    }
}