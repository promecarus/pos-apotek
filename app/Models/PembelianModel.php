<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'penjualan_id',
        'stok_id',
        'jumlah',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getPembelian($id = false)
    {
        $pembelian = $this
            ->select('
            pembelian.id,
            stok_id,
            obat.nama as obat,
            CONCAT_WS(
                " ",
                kemasan.keterangan,
                kemasan.angka,
                kemasan.satuan
            ) as kemasan,
            jual as harga,
            pembelian.jumlah
            ')
            ->join('stok', 'pembelian.stok_id = stok.id')
            ->join('obat', 'stok.obat_id = obat.id')
            ->join('kemasan', 'stok.kemasan_id = kemasan.id');

        if ($id == false) {
            return $pembelian->findAll();
        }
        return $pembelian->find($id);
    }
}
