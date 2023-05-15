<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Master extends BaseController
{
    public function item1()
    {
        return view('master/item1', [
            'title' => 'Master Item 1'
        ]);
    }

    public function item2()
    {
        return view('master/item2', [
            'title' => 'Master Item 2'
        ]);
    }

    public function item3()
    {
        return view('master/item3', [
            'title' => 'Master Item 3'
        ]);
    }
}
