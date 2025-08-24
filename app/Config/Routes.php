<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\Survei;
use App\Controllers\TestimoniController;
use App\Controllers\Admin\Login;
use App\Controllers\Admin\Dashboard;

/**
 * @var RouteCollection $routes
 */

// Halaman utama diarahkan ke survei/beranda
$routes->get('/', 'Survei::index');

// ROUTE SURVEI
$routes->get('survei', 'Survei::index');
$routes->post('survei/submit', 'Survei::submit');

// ROUTE TESTIMONI
$routes->get('testimoni', 'TestimoniController::index');
$routes->post('testimoni/submit', 'TestimoniController::submit');

// ADMIN ROUTE
// ADMIN ROUTE
$routes->group('admin', function($routes){
    $routes->get('login', 'Admin\Login::index');      // Form login
    $routes->post('login', 'Admin\Login::login');     // Proses login
    $routes->get('logout', 'Admin\Login::logout');    // Logout
    
    // Dashboard & menu utama
    $routes->get('dashboard', 'Admin\Dashboard::index', ['filter' => 'adminAuth']);
    $routes->get('statistik', 'Admin\Dashboard::statistik', ['filter' => 'adminAuth']);
    $routes->get('hasil', 'Admin\Dashboard::hasil', ['filter' => 'adminAuth']);
    $routes->get('testimoni', 'Admin\Dashboard::testimoni', ['filter' => 'adminAuth']);
    $routes->get('kelola-admin', 'Admin\Dashboard::kelolaAdmin', ['filter' => 'adminAuth']);

    $routes->get('survei/read/(:num)', 'Survei::read/$1');
    $routes->post('survei/delete/(:num)', 'Survei::delete/$1');


});


