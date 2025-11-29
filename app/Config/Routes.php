<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/barang', 'Home::barangPage');
$routes->get('/transaksi', 'Home::transaksiPage');
$routes->get('/penjualan', 'Home::penjualanPage');
$routes->get('/kategori', 'Home::kategoriPage');

// routes kategori 
$routes->post('/add/kategori', 'CategoryController::addCategory');
$routes->post('/edit/kategori/(:any)', 'CategoryController::editCategory/$1');
$routes->post('/delete/kategori/(:any)', 'CategoryController::deleteCategory/$1');
