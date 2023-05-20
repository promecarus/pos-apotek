<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Obat extends BaseController
{
    protected $obatModel;

    public function __construct()
    {
        $this->obatModel = new \App\Models\ObatModel();
    }

    public function index()
    {
        return view('master/obat', [
        'title' => 'Obat',
            'bodyClass' => 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed',
            'fields' => [
                'id', 'nama', 'keterangan',
            ],
            'rules' => '{
                nama: {
                    required: true,
                    minlength: 2,
                    maxlength: 255
                },
                keterangan: {
                    minlength: 2,
                    maxlength: 255
                },
                dosis_tetap: {
                    required: true
                }
            }',
            'messages' => '{
                nama: {
                    required: "Nama tidak boleh kosong",
                    minlength: "Nama minimal 2 karakter",
                    maxlength: "Nama maksimal 255 karakter"
                },
                keterangan: {
                    minlength: "Keterangan minimal 2 karakter",
                    maxlength: "Keterangan maksimal 255 karakter"
                },
                dosis_tetap: {
                    required: "Tipe dosis tidak boleh kosong"
                }
            }',
            'dataTable' => $this->obatModel->getObat(),
        ]);
    }

    public function store()
    {
        $obat = $this->obatModel->where('nama', $this->request->getVar('nama'))->first();
        if ($obat) {
            return redirect()
                ->back()
                ->with('message', 'Nama obat sudah ada')
                ->with('type', 'error');
        } else {
            $this->obatModel->insert([
                'nama' => esc($this->request->getVar('nama')),
                'keterangan' => esc($this->request->getVar('keterangan')),
            ]);

            return redirect()
                ->back()
                ->with('message', 'Data berhasil ditambahkan')
                ->with('type', 'success');
        }
    }

    public function update($id)
    {
        $this->obatModel->update($id, [
            'nama' => esc($this->request->getVar('nama')),
            'keterangan' => esc($this->request->getVar('keterangan')),
        ]);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil diubah')
            ->with('type', 'success');
    }

    public function delete($id)
    {
        $this->obatModel->delete($id);

        return redirect()
            ->back()
            ->with('message', 'Data berhasil dihapus')
            ->with('type', 'success');
    }
}
