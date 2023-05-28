<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TempPembelian extends BaseController
{
    protected $tempPembelianModel;
    protected $stokModel;

    public function __construct()
    {
        $this->tempPembelianModel = new \App\Models\TempPembelianModel();
        $this->stokModel = new \App\Models\StokModel();
    }

    public function submit()
    {
        $inputStokId = $this->request->getVar('stok_id');
        $inputJumlah = $this->request->getVar('jumlah');
        $jumlahStok = $this->stokModel->find($inputStokId)['jumlah'];
        $tempPembelian = $this->tempPembelianModel->where('stok_id', $inputStokId)->first();

        if ($jumlahStok < $inputJumlah) {
            return redirect()
                ->back()
                ->with('message', 'Jumlah stok tidak mencukupi')
                ->with('type', 'error');
        }

        if ($tempPembelian) {
            if ($tempPembelian['jumlah'] + $inputJumlah == 0) {
                $this->tempPembelianModel->delete($tempPembelian['id']);

                $this->stokModel->update($inputStokId, [
                    'jumlah' => $jumlahStok + $tempPembelian['jumlah'],
                ]);

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil dihapus')
                    ->with('type', 'success');
            } elseif ($tempPembelian['jumlah'] + $inputJumlah < 0) {
                return redirect()
                    ->back()
                    ->with('message', 'Jumlah tidak boleh kurang dari sama dengan 0')
                    ->with('type', 'error');
            } else {
                $this->tempPembelianModel->update($tempPembelian['id'], [
                    'jumlah' => $tempPembelian['jumlah'] + $inputJumlah,
                ]);

                $this->stokModel->update($inputStokId, [
                    'jumlah' => $jumlahStok - $inputJumlah,
                ]);

                return redirect()
                    ->back()
                    ->with('message', 'Data berhasil diubah')
                    ->with('type', 'success');
            }
        }

        if ($inputJumlah <= 0) {
            return redirect()
                ->back()
                ->with('message', 'Jumlah tidak boleh kurang dari sama dengan 0')
                ->with('type', 'error');
        } else {
            $this->tempPembelianModel->insert([
                'stok_id' => $inputStokId,
                'jumlah' => $inputJumlah,
            ]);

            $this->stokModel->update($inputStokId, [
                'jumlah' => $jumlahStok - $inputJumlah,
            ]);

            return redirect()
                ->back()
                ->with('message', 'Data berhasil ditambahkan')
                ->with('type', 'success');
        }
    }

    public function reset()
    {
        foreach ($this->tempPembelianModel->findAll() as $item) {
            $this->stokModel->update($item['stok_id'], [
                'jumlah' => $this->stokModel->find($item['stok_id'])['jumlah'] + $item['jumlah'],
            ]);
        }

        $this->tempPembelianModel->truncate();

        return redirect()
            ->back()
            ->with('message', 'Data berhasil direset')
            ->with('type', 'success');
    }
}
