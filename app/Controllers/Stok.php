<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Stok extends BaseController
{
    protected $stokModel;

    public function __construct()
    {
        $this->stokModel = new \App\Models\StokModel();
    }

    public function index()
    {
        return view('transaksi/stok', [
            'title' => 'Stok',
            'bodyClass' => 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed',
            'fields' => [
                'id', 'obat_id', 'kemasan_id', 'jumlah', 'kedarluwarsa',
            ],
            'rules' => '{
                obat_id: {
                    required: true
                },
                kemasan_id: {
                    required: true
                },
                jumlah: {
                    required: true,
                    number: true,
                    min: 1
                },
                kedarluwarsa: {
                    required: true
                }
            }',
            'messages' => '{
                obat_id: {
                    required: "Obat tidak boleh kosong"
                },
                kemasan_id: {
                    required: "Kemasan tidak boleh kosong"
                },
                jumlah: {
                    required: "Jumlah tidak boleh kosong",
                    number: "Jumlah harus berupa angka",
                    min: "Jumlah minimal 1"
                },
                kedarluwarsa: {
                    required: "Kedarluwarsa tidak boleh kosong"
                }
            }',
            'dataTable' => $this->stokModel->getStok(),
            'obat' => (new \App\Models\ObatModel())
                ->select('id, nama')
                ->where('deleted_at', null)
                ->get()->getResultArray(),
            'kemasan' => (new \App\Models\KemasanModel())
                ->select('id, CONCAT_WS(" ", keterangan, angka, satuan) as nama')
                ->where('deleted_at', null)
                ->get()->getResultArray(),
        ]);
    }

    public function store()
    {
        $this->stokModel->insert([
            'obat_id' => $this->request->getVar('obat_id'),
            'kemasan_id' => $this->request->getVar('kemasan_id'),
            'jumlah' => $this->request->getVar('jumlah'),
            'kedarluwarsa' => date('Y-m-d', strtotime(str_replace('/', '-', $this->request->getVar('kedarluwarsa')))),
        ]);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil ditambahkan')
            ->with('type', 'success');
    }

    public function update($id)
    {
        $this->stokModel->update($id, [
            'obat_id' => $this->request->getVar('obat_id'),
            'kemasan_id' => $this->request->getVar('kemasan_id'),
            'jumlah' => $this->request->getVar('jumlah'),
            'kedarluwarsa' => date('Y-m-d', strtotime(str_replace('/', '-', $this->request->getVar('kedarluwarsa')))),
        ]);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil diubah')
            ->with('type', 'success');
    }

    public function delete($id)
    {
        $this->stokModel->delete($id);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus')
            ->with('type', 'success');
    }
}
