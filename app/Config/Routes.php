<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/detail/(:num)', 'Mahasiswa::detail/$1');
$routes->get('detail/delete/(:num)', 'Mahasiswa::delete/$1');
$routes->post('/simpan', 'Mahasiswa::simpan');
