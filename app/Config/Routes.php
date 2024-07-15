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
$routes->setDefaultController('Home');
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
// Rack
$routes->get('/', 'Home::index');
$routes->get('/rackV', 'View::rackV');
$routes->get('/rackW', 'View::rackW');
$routes->get('/rackX', 'View::rackX');
$routes->get('/rackY', 'View::rackY');
$routes->get('/rackOthers', 'View::rackOthers');
$routes->get('/detail/(:any)', 'View::detail/$1');

// Input Data Auto
$routes->get('/inputAuto', 'View::inputAuto');
$routes->post('/inputAuto', 'Fitur::scanning');

// Input Data
$routes->get('/input/(:any)', 'View::input/$1');
$routes->post('/input/(:any)', 'Fitur::update/$1');

// Edit Data
$routes->get('/editData/(:any)', 'View::edit/$1');
$routes->post('/editData/(:any)', 'Fitur::updateData/$1');

// Tambah Data Sisa
$routes->get('/tambahSisa/(:any)', 'View::tambahForm/$1');
$routes->post('/tambahSisa', 'Fitur::tambahDataSisa');

// Bypass
$routes->post('/bypass/(:any)', 'Fitur::bypass/$1');

// Reset
$routes->get('/reset/(:any)', 'Fitur::reset/$1');

// Edit Data Sisa
$routes->get('/editSisa/(:any)', 'View::editSisa/$1');
$routes->post('/editSisa/(:any)', 'Fitur::updateDataSisa/$1');

// Delete Data Sisa
$routes->get('/delSisa/(:any)', 'Fitur::delSisa/$1');

// List Data
$routes->get('/listdata', 'View::ListData');
$routes->get('/export', 'Fitur::exportExcel');


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
