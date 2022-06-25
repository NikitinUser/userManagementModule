<?php 
namespace NikitinUser\userManagementModule\lib\Models;

use Illuminate\Database\Eloquent\Model;

use NikitinUser\userManagementModule\lib\Models\UserManagement;
use NikitinUser\userManagementModule\lib\Models\Role;

class RolesForUser extends Model
{
    protected $table = 'roles_for_user';

    protected $fillable = [
        'id_role',
        'id_user',
    ];

    public function getAllUsersWithRoles(): array
    {
        return $this->leftJoin('roles', 'roles_for_user.id_role', '=', 'roles.id')
            ->leftJoin('users', 'roles_for_user.id_user', '=', 'users.id')
            ->get()
            ->toArray();
    }
}
