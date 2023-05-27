<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Dashboard::index');
$routes->add('/dashboard/(:any)', 'Dashboard::$1');

$routes->add('/auth/(:any)', 'Auth::$1');

$routes->add('/master/kemasan', 'Kemasan::index');
$routes->add('/master/kemasan/(:any)(/(:any))?', 'Kemasan::$1/$2');

$routes->add('/master/obat', 'Obat::index');
$routes->add('/master/obat/(:any)(/(:any))?', 'Obat::$1/$2');

$routes->add('/master/pelanggan', 'Pelanggan::index');
$routes->add('/master/pelanggan/(:any)(/(:any))?', 'Pelanggan::$1/$2');

$routes->add('/master/user', 'User::index');
$routes->add('/master/user/(:any)(/(:any))?', 'User::$1/$2');

$routes->add('/transaksi/stok', 'Stok::index');
$routes->add('/transaksi/stok/(:any)(/(:any))?', 'Stok::$1/$2');

$routes->add('/transaksi/penjualan', 'Penjualan::index');
$routes->add('/transaksi/penjualan/(:any)(/(:any))?', 'Penjualan::$1/$2');

$routes->add('(:any)', function () {
    return redirect()
        ->back()
        ->with('message', 'Halaman tidak ditemukan')
        ->with('type', 'warning');
});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
