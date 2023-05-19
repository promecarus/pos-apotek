<?php

namespace App\Models;

use CodeIgniter\Model;

class DosisModel extends Model
{
    protected $table = 'dosis';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'angka',
        'satuan',
        'keterangan',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getDosis($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }
}
