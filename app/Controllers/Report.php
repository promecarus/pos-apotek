<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Report extends BaseController
{
    public function item1()
    {
        return view('report/item1', [
            'title' => 'Report'
        ]);
    }
}
