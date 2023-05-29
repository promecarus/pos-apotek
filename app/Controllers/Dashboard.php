<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard/index', [
            'title' => 'Dashboard',
            'bodyClass' => 'hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed',
            'infos' => [
                'Kemasan' => [
                    'bg' => 'info',
                    'value' => (new \App\Models\KemasanModel())->countAll(),
                    'icon' => 'box',
                    'link' => 'master/kemasan'
                ],
                'Obat' => [
                    'bg' => 'success',
                    'value' => (new \App\Models\ObatModel())->countAll(),
                    'icon' => 'pills',
                    'link' => 'master/obat'
                ],
                'Pelanggan' => [
                    'bg' => 'warning',
                    'value' => (new \App\Models\PelangganModel())->countAll(),
                    'icon' => 'users',
                    'link' => 'master/pelanggan'
                ],
                'User' => [
                    'bg' => 'primary',
                    'value' => (new \App\Models\UserModel())->countAll(),
                    'icon' => 'user',
                    'link' => 'master/user'
                ],
                'Penjualan' => [
                    'bg' => 'secondary',
                    'value' => (new \App\Models\PenjualanModel())->countAll(),
                    'icon' => 'shopping-cart',
                    'link' => 'transaksi/penjualan'
                ],
                'Stok' => [
                    'bg' => 'danger',
                    'value' => (new \App\Models\StokModel())->countAll(),
                    'icon' => 'boxes',
                    'link' => 'transaksi/stok'
                ],
            ],
        ]);
    }

    public function themeSwitcher()
    {
        session()->get('theme')
            ? session()->set('theme', false)
            : session()->set('theme', true);

        return redirect()
            ->back()
            ->with('message', 'Tema berhasil diubah')
            ->with('type', 'success');
    }
}
