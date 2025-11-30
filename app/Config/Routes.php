<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auth Routes (tidak perlu login)
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');

// Protected Routes (perlu login)
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/barang', 'Home::barangPage');
    $routes->get('/transaksi', 'Home::transaksiPage');
    $routes->get('/penjualan', 'Home::penjualanPage');
    $routes->get('/kategori', 'Home::kategoriPage');

    // routes kategori 
    $routes->post('/add/kategori', 'CategoryController::addCategory');
    $routes->post('/edit/kategori/(:any)', 'CategoryController::editCategory/$1');
    $routes->post('/delete/kategori/(:any)', 'CategoryController::deleteCategory/$1');
    $routes->get('/get/category-name/(:any)', 'CategoryController::getCategoryName/$1');

    // routes barang
    $routes->post('/add/barang', 'BarangController::addBarang');
    $routes->post('/edit/barang/(:any)', 'BarangController::editBarang/$1');
    $routes->post('/delete/barang/(:any)', 'BarangController::deleteBarang/$1');

    // routes user management (hanya admin)
    $routes->get('/users', 'UserController::index');
    $routes->post('/users/add', 'UserController::addUser');
    $routes->post('/users/edit/(:num)', 'UserController::editUser/$1');
    $routes->post('/users/delete/(:num)', 'UserController::deleteUser/$1');
    $routes->post('/users/toggle-status/(:num)', 'UserController::toggleStatus/$1');
});
