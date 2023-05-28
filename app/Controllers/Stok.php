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
                'id', 'obat_id', 'kemasan_id', 'beli', 'jual', 'jumlah', 'kedarluwarsa',
            ],
            'rules' => '{
                obat_id: {
                    required: true
                },
                kemasan_id: {
                    required: true
                },
                beli: {
                    required: true,
                    number: true,
                    min: 1
                },
                jual: {
                    required: true,
                    number: true,
                    min: () => parseFloat($("#beli").val()) + 500
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
                beli: {
                    required: "Harga beli tidak boleh kosong",
                    number: "Harga beli harus berupa angka",
                    min: "Harga beli minimal 1"
                },
                jual: {
                    required: "Harga jual tidak boleh kosong",
                    number: "Harga jual harus berupa angka",
                    min: "Harga jual minimal selisih 500 dari harga beli"
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
            'beli' => $this->request->getVar('beli'),
            'jual' => $this->request->getVar('jual'),
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
            'beli' => $this->request->getVar('beli'),
            'jual' => $this->request->getVar('jual'),
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
