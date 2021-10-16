<?php 
namespace NikitinUser\userManagementModule\lib\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    protected $table = 'roles';

    public function addRole($roleData)
    {
        $this->insert($roleData);
    }

    public function getAll()
    {
        return $this->select()
             ->get()
             ->toArray();
    }

    public function deleteRole($roleId)
    {
        DB::table('permissions_for_role')
                ->where('id_role', '=', $roleId)
                ->delete();

        $this->where('id', $roleId)->delete();
    }
}