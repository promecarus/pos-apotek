<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kemasan extends BaseController
{
    protected $kemasanModel;

    public function __construct()
    {
        $this->kemasanModel = new \App\Models\KemasanModel();
    }

    public function index()
    {
        return view('master/kemasan', [
            'title' => 'Kemasan',
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
            'dataTable' => $this->kemasanModel->getKemasan(),
        ]);
    }

    public function store()
    {
        $data = [
            'angka' => $this->request->getVar('angka'),
            'satuan' => esc($this->request->getVar('satuan')),
            'keterangan' => esc($this->request->getVar('keterangan')),
        ];

        if ($this->kemasanModel->where($data)->first()) {
            return redirect()
                ->back()
                ->with('message', 'Data sudah ada')
                ->with('type', 'warning');
        }

        $this->kemasanModel->insert($data);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil ditambahkan')
            ->with('type', 'success');
    }

    public function update($id)
    {
        $data = [
            'angka' => $this->request->getVar('angka'),
            'satuan' => esc($this->request->getVar('satuan')),
            'keterangan' => esc($this->request->getVar('keterangan')),
        ];

        if ($this->kemasanModel->where($data)->first()) {
            return redirect()
                ->back()
                ->with('message', 'Data sudah ada')
                ->with('type', 'warning');
        }

        $this->kemasanModel->update($id, $data);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil diubah')
            ->with('type', 'success');
    }

    public function delete($id)
    {
        $this->kemasanModel->delete($id);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus')
            ->with('type', 'success');
    }
}
