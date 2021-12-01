<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/home', 'Home::index');
$routes->get('/home/index', 'Home::index');
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/index', 'Admin::index');

$routes->get('/admin/error_404', 'Admin::error_404');
$routes->get('/admin/penyuluh', 'Admin::penyuluh');
$routes->get('/admin/penyuluh/create', 'Admin::create');
$routes->get('/admin/kelola_pengguna', 'Admin::kelola_pengguna');
$routes->get('/admin/kelola_pengguna/p', 'Admin::kelola_pengguna/p');
$routes->get('/admin/kelola_pengguna/a', 'Admin::kelola_pengguna/a');
$routes->get('/admin/kelola_pengguna/(:any)', 'Admin::detail_user/$1');
$routes->get('/admin/proposal_masuk', 'Admin::proposal_masuk');
$routes->get('/admin/proposal_disetujui', 'Admin::proposal_disetujui');
$routes->get('/admin/proposal_ditolak', 'Admin::proposal_ditolak');
$routes->get('/admin/respon/(:segment)', 'Admin::respon/$1');
$routes->get('/home/update/(:num)', 'Admin::update/$1');
$routes->get('/admin/(:any)', 'Admin::detail_proposal/$1');

$routes->get('/upload/(:any)', 'Home::view/$1');
$routes->get('/home/create', 'Home::create');
$routes->get('/home/update/(:num)', 'Home::update/$1');
$routes->get('/home/edit/(:segment)', 'Home::edit/$1');
$routes->get('/home/profile', 'Home::profile');
$routes->get('/home/proposal', 'Home::proposal');
$routes->get('/home/error_404', 'Home::error_404');
$routes->get('/home/send', 'Home::send');
$routes->delete('/home/(:num)', 'Home::delete/$1');
$routes->get('/home/(:any)', 'Home::detail/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
