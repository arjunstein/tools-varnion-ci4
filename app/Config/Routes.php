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
// $routes->get('/', 'Home::index');

// *** FRONT END ***
// Authentication
$routes->get('/', 'auth\login::index');
$routes->post('auth/login/proccess', 'auth\login::proccess');
$routes->get('auth/login/logout/(:num)', 'auth\login::logout/$1');
// *** BACKEND ***
$routes->group('backend', ['filter' => 'AuthFilter'], static function ($routes) {
    $routes->get('dashboard', 'backend\DashboardController::index');
    $routes->resource('users', ['controller' => 'backend\UserController', 'except' => 'show']);
    $routes->resource('notes', ['controller' => 'backend\NoteController']);
    $routes->resource('categories', ['controller' => 'backend\CategoryController', 'except' => 'show']);
    $routes->resource('categories_external', ['controller' => 'backend\CategoryExternalController', 'except' => 'show']);
    $routes->resource('categories_gamas', ['controller' => 'backend\CategoryGamasController', 'except' => 'show']);
    $routes->resource('categories_notes', ['controller' => 'backend\CategoryNotesController', 'except' => 'show']);
    $routes->resource('categories_privilege', ['controller' => 'backend\CategoryPrivilegeController', 'except' => 'show']);
    $routes->resource('internal_tools', ['controller' => 'backend\InternalToolsController', 'except' => 'show']);
    $routes->resource('incoming_case', ['controller' => 'backend\IncomingCaseController', 'except' => 'show']);
    $routes->resource('sop', ['controller' => 'backend\SopController', 'except' => 'show']);
    $routes->post('sop/uploadImage/', 'backend\SopController::uploadImage');
    $routes->get('sop/list/', 'backend\SopController::list');
    $routes->resource('teams', ['controller' => 'backend\TeamController', 'except' => 'show']);
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
