<?php

namespace App\Models;

use CodeIgniter\Model;

class TempPembelianModel extends Model
{
    protected $table = 'temp_pembelian';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $protectFields = true;
    protected $allowedFields = [
        'stok_id',
        'jumlah',
    ];

    public function getTempPembelian($id = false)
    {
        $tempPembelian = $this
            ->select('
                temp_pembelian.id,
                stok_id,
                obat.nama as obat,
                CONCAT_WS(
                    " ",
                    kemasan.keterangan,
                    kemasan.angka,
                    kemasan.satuan
                ) as kemasan,
                jual as harga,
                temp_pembelian.jumlah
            ')
            ->join('stok', 'temp_pembelian.stok_id = stok.id')
            ->join('obat', 'stok.obat_id = obat.id')
            ->join('kemasan', 'stok.kemasan_id = kemasan.id');

        if ($id == false) {
            return $tempPembelian->findAll();
        }
        return $tempPembelian->find($id);
    }
}
