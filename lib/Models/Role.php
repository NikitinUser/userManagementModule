<?php 
namespace NikitinUser\UserManagementModule\Lib\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'role_name',
    ];
}
