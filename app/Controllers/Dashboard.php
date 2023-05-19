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
        ]);
    }

    public function themeSwitcher()
    {
        session()->get('theme')
            ? session()->set('theme', false)
            : session()->set('theme', true);

        return redirect()->back();
    }
}
