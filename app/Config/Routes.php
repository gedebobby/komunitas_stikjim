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
$routes->setDefaultController('Auth');
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
$routes->get('/', 'Auth::index');

$routes->group('', ['filter' => 'UserCheckAuth'], function($routes){
    $routes->get('/user', 'User::index');
    $routes->get('/user/registrasi', 'User::registrasi');
});

$routes->group('', ['filter' => 'AlreadyUser'], function($routes){
    $routes->get('/', 'Auth::index');
    $routes->get('/auth', 'Auth::index');
    $routes->get('/auth/registrasi', 'Auth::registrasi');
    $routes->get('/auth/login_admin', 'Auth::login_admin');
});

$routes->group('', ['filter' => 'AdminCheckAuth'], function($routes){
    $routes->get('/admin', 'Admin::index');
    $routes->get('/admin/useradmin', 'Admin::useradmin');
    $routes->get('/admin/data_komunitas', 'Admin::data_komunitas');
    $routes->get('/admin/data_anggota', 'Admin::data_anggota');
    $routes->get('/admin/event', 'Admin::event');
    $routes->get('/admin/list_peserta', 'Admin::list_peserta');
    $routes->get('/admin/kegiatan', 'Admin::kegiatan');
});

$routes->group('', ['filter' => 'AlreadyAdmin'], function($routes){
    $routes->get('/', 'Auth::index');
    $routes->get('/auth', 'Auth::index');
    $routes->get('/auth/registrasi', 'Auth::registrasi');
    $routes->get('/auth/login_admin', 'Auth::login_admin');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
