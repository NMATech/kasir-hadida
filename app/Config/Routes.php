<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/barang', 'Home::barangPage');
$routes->get('/transaksi', 'Home::transaksiPage');
$routes->get('/penjualan', 'Home::penjualanPage');
