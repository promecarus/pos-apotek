<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    public function item1()
    {
        return view('transaksi/item1', [
            'title' => 'Transaksi'
        ]);
    }
}
