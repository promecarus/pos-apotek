<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'email',
        'username',
        'password',
        'nama',
        'role_id',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getUser($id = false)
    {
        $user = $this
            ->select('
                users.id,
                role_id,
                email,
                username,
                nama,
                roles.role
            ')
            ->join('roles', 'users.role_id = roles.id');

        if ($id == false) {
            return $user->findAll();
        }
        return $user->find($id);
    }
}
