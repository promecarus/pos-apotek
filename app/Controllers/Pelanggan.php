<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pelanggan extends BaseController
{
    protected $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new \App\Models\PelangganModel();
    }

    public function index()
    {
        return view('master/pelanggan', [
            'title' => 'Pelanggan',
            'bodyClass' => 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed',
            'fields' => [
                'id', 'nama', 'alamat', 'telepon',
            ],
            'rules' => '{
                nama: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                alamat: {
                    minlength: 2,
                    maxlength: 255
                },
                telepon: {
                    required: true,
                    pattern: /^(?:\+?62|0)[-\s]?[1-9]\d{1,3}[-\s]?\d{1,4}[-\s]?\d{1,4}$/,
                    maxlength: 255
                }
            }',
            'messages' => '{
                nama: {
                    required: "Nama tidak boleh kosong",
                    minlength: "Nama minimal 2 karakter",
                    maxlength: "Nama maksimal 255 karakter"
                },
                alamat: {
                    minlength: "Alamat minimal 2 karakter",
                    maxlength: "Alamat maksimal 255 karakter"
                },
                telepon: {
                    required: "Telepon tidak boleh kosong",
                    pattern: "Telepon tidak valid",
                    maxlength: "Telepon maksimal 255 karakter"
                }
            }',
            'dataTable' => $this->pelangganModel->getPelanggan(),
        ]);
    }

    public function store()
    {
        $this->pelangganModel->insert([
            'nama' => esc($this->request->getVar('nama')),
            'alamat' => esc($this->request->getVar('alamat')),
            'telepon' => $this->request->getVar('telepon'),
        ]);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil ditambahkan')
            ->with('type', 'success');
    }

    public function update($id)
    {
        $this->pelangganModel->update($id, [
            'nama' => esc($this->request->getVar('nama')),
            'alamat' => esc($this->request->getVar('alamat')),
            'telepon' => $this->request->getVar('telepon'),
        ]);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil diubah')
            ->with('type', 'success');
    }

    public function delete($id)
    {
        $this->pelangganModel->delete($id);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus')
            ->with('type', 'success');
    }
}
