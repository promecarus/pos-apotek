<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'user_id',
        'pelanggan_id',
        'total',
        'bayar',
        'kembalian',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getPenjualan($id = false)
    {
        $penjualan = $this->select('
                penjualan.id as id,
                users.nama as kasir,
                pelanggan.nama as pelanggan,
                penjualan.total as total,
                penjualan.bayar as bayar,
                penjualan.kembalian as kembalian,
                penjualan.created_at as tanggal,
            ')
            ->join('users', 'users.id = penjualan.user_id')
            ->join('pelanggan', 'pelanggan.id = penjualan.pelanggan_id')
            ->orderBy('penjualan.id', 'DESC');
        if ($id == false) {
            return $penjualan->findAll();
        }
        return $penjualan->find($id);
    }
}
