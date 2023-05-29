<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penjualan extends BaseController
{
    protected $pelangganModel;
    protected $penjualanModel;
    protected $stokModel;
    protected $tempPembelianModel;
    protected $pembelianModel;
    protected $userModel;

    public function __construct()
    {
        $this->pelangganModel = new \App\Models\PelangganModel();
        $this->penjualanModel = new \App\Models\PenjualanModel();
        $this->stokModel = new \App\Models\StokModel();
        $this->tempPembelianModel = new \App\Models\TempPembelianModel();
        $this->pembelianModel = new \App\Models\PembelianModel();
        $this->userModel = new \App\Models\UserModel();
    }

    public function index()
    {
        return view('transaksi/penjualan', [
            'title' => 'Penjualan',
            'bodyClass' => 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed',
            'tableTempPembelian' => $this->tempPembelianModel->getTempPembelian(),
            'tablePenjualan' => $this->penjualanModel->getPenjualan(),
            'user' => $this->userModel->where('username', session()->get('username'))
                ->get()->getResultArray(),
            'pelanggan' => $this->pelangganModel
                ->where('deleted_at', null)
                ->get()->getResultArray(),
            'stok' => $this->stokModel
                ->select('
                    stok.id as id,
                    CONCAT_WS(" ", obat.nama, "|", CONCAT_WS(" ", kemasan.keterangan, angka, satuan), "|", stok.jumlah) as stok
                ')
                ->join('obat', 'obat.id = stok.obat_id')
                ->join('kemasan', 'kemasan.id = stok.kemasan_id')
                ->where('stok.deleted_at', null)
                ->where('stok.jumlah >=', 0)
                ->orderBy('obat.nama', 'ASC')
                ->get()->getResultArray(),
        ]);
    }

    public function store()
    {
        $this->penjualanModel->insert([
            'user_id' => session()->get('user_id'),
            'pelanggan_id' => $this->request->getVar('pelanggan_id'),
            'total' => $this->request->getVar('total'),
            'bayar' => $this->request->getVar('bayar'),
            'kembalian' => $this->request->getVar('kembalian'),
        ]);

        $penjualanId = $this->penjualanModel->getInsertID();

        foreach (json_decode($this->request->getVar('pembelian'), true) as $key => $value) {
            $this->pembelianModel->insert([
                'penjualan_id' => $penjualanId,
                'stok_id' => $value['stok_id'],
                'jumlah' => $value['jumlah'],
            ]);
        }

        $this->tempPembelianModel->truncate();

        return redirect()
            ->back()
            ->with('message', 'Penjualan berhasil disimpan')
            ->with('type', 'success');
    }

    public function delete($id)
    {
        $this->penjualanModel->delete($id);

        return redirect()
            ->back()
            ->with('message', 'Penjualan berhasil dihapus')
            ->with('type', 'success');
    }

    public function invoice($id)
    {
        $penjualan = $this->penjualanModel->getPenjualan($id);

        helper('number');

        return view('transaksi/invoice', [
            'penjualan' => $penjualan,
            'kasir' => $penjualan['kasir'],
            'pelanggan' => $penjualan['pelanggan'],
            'tanggal' => $penjualan['tanggal'],
            'pembelian' => json_encode($this->pembelianModel
                ->select('
                    obat.nama as nama,
                    CONCAT_WS(" ", kemasan.keterangan, angka, satuan) as kemasan,
                    pembelian.jumlah as jumlah,
                    stok.jual as harga,
                    (pembelian.jumlah * stok.jual) as subtotal
                ')
                ->join('penjualan', 'penjualan.id = pembelian.penjualan_id')
                ->join('stok', 'stok.id = pembelian.stok_id')
                ->join('obat', 'obat.id = stok.obat_id')
                ->join('kemasan', 'kemasan.id = stok.kemasan_id')
                ->where('penjualan_id', $id)
                ->get()->getResultArray())
        ]);
    }
}
