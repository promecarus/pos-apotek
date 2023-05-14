<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';

    public function getRole($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getRoleName($role_id)
    {
        return $this->where(['id' => $role_id])->first()['role'];
    }

    public function getRoleID($role)
    {
        return $this->where(['role' => $role])->first()['id'];
    }
}
