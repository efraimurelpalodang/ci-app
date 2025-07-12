<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Beranda::index');
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/tambah', 'Mahasiswa::tambahDataMahasiswa');
$routes->post('/tambah', 'Mahasiswa::cekData');
$routes->get('/detail/(:num)', 'Mahasiswa::detailMahasiswa/$1');
$routes->post('/detail/(:num)', 'Mahasiswa::detailMahasiswa/$1');
$routes->post('/cekDetail/(:num)', 'Mahasiswa::cekUbahData/$1');
$routes->get('/ubah/(:num)', 'Mahasiswa::ubah/$1');
$routes->get('/mahasiswa/(:num)', 'Mahasiswa::hapusData/$1');
