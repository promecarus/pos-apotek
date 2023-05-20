<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dosis extends BaseController
{
    protected $dosisModel;

    public function __construct()
    {
        $this->dosisModel = new \App\Models\DosisModel();
    }

    public function index()
    {
        return view('master/dosis', [
            'title' => 'Dosis',
            'bodyClass' => 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed',
            'fields' => [
                'id', 'angka', 'satuan', 'keterangan',
            ],
            'rules' => '{
                angka: {
                    number: true,
                    min: 1,
                },
                satuan: {
                    required: true,
                    minlength: 1,
                    maxlength: 255
                },
                keterangan: {
                    minlength: 2,
                    maxlength: 255
                }
            }',
            'messages' => '{
                angka: {
                    number: "Angka harus berupa angka",
                    min: "Angka minimal 1",
                },
                satuan: {
                    required: "Satuan tidak boleh kosong",
                    minlength: "Satuan minimal 1 karakter",
                    maxlength: "Satuan maksimal 255 karakter"
                },
                keterangan: {
                    minlength: "Keterangan minimal 2 karakter",
                    maxlength: "Keterangan maksimal 255 karakter"
                }
            }',
            'dataTable' => $this->dosisModel->getDosis(),
        ]);
    }

    public function store()
    {
        $this->dosisModel->insert([
            'angka' => $this->request->getVar('angka'),
            'satuan' => esc($this->request->getVar('satuan')),
            'keterangan' => esc($this->request->getVar('keterangan')),
        ]);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil ditambahkan')
            ->with('type', 'success');
    }

    public function update($id)
    {
        $this->dosisModel->update($id, [
            'angka' => $this->request->getVar('angka'),
            'satuan' => esc($this->request->getVar('satuan')),
            'keterangan' => esc($this->request->getVar('keterangan')),
        ]);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil diubah')
            ->with('type', 'success');
    }

    public function delete($id)
    {
        $this->dosisModel->delete($id);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus')
            ->with('type', 'success');
    }
}
