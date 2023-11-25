<?php

namespace NikitinUser\UserManagementModule\Lib\Models;

use Illuminate\Database\Eloquent\Model;

class RolesForUser extends Model
{
    protected $table = 'roles_for_user';

    protected $fillable = [
        'id_role',
        'id_user',
    ];
}
