<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Pegawai::index');
$routes->post('/pegawai/simpan', 'Pegawai::simpan');
$routes->setAutoRoute(true);
