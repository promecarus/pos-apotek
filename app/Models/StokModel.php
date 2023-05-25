<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table = 'stok';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'obat_id',
        'kemasan_id',
        'jumlah',
        'kedarluwarsa',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getStok($id = false)
    {
        $obat = $this
            ->select('
                stok.id,
                obat.id as obat_id,
                kemasan.id as kemasan_id,
                obat.nama as obat,
                CONCAT_WS(
                    " ",
                    kemasan.keterangan,
                    kemasan.angka,
                    kemasan.satuan
                ) as kemasan,
                jumlah,
                kedarluwarsa
            ')
            ->join('obat', 'stok.obat_id = obat.id')
            ->join('kemasan', 'stok.kemasan_id = kemasan.id');

        if ($id == false) {
            return $obat->findAll();
        }
        return $obat->find($id);
    }
}
