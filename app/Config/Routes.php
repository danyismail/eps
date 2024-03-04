<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setAutoRoute(true);
$routes->get('/', 'Kpi::index');
$routes->get('/ePS/kpi', 'Kpi::index');
$routes->get('/ePS/RekapSpl', 'Deposit::index');
$routes->get('/ePS/Rect', 'Sales::index');
$routes->get('/ePS/Rect/periode', 'Sales::salesPeriode');

$routes->get('/AmZ/kpi', 'Kpi::get_kpi');
$routes->get('/AmZ/RekapSpl', 'Deposit::get_deposit');
$routes->get('/AmZ/Rect', 'Sales::get_sales');
$routes->get('/AmZ/Rect/periode', 'Sales::get_sales_periode');

$routes->get('/finance/supplier/eps', 'Finance\Eps\Supplier::index');
$routes->get('/finance/supplier/eps/status', 'Finance\Eps\Supplier::status');
$routes->get('/finance/supplier/eps/add', 'Finance\Eps\Supplier::add');
$routes->post('/finance/supplier/eps/create', 'Finance\Eps\Supplier::create');
$routes->get('/finance/supplier/eps/edit', 'Finance\Eps\Supplier::edit');
$routes->post('/finance/supplier/eps/update', 'Finance\Eps\Supplier::update');
$routes->get('/finance/supplier/eps/delete', 'Finance\Eps\Supplier::delete');

$routes->get('/finance/supplier/amz', 'Finance\Amz\Supplier::index');
$routes->get('/finance/supplier/amz/status', 'Finance\Amz\Supplier::status');
$routes->get('/finance/supplier/amz/add', 'Finance\Amz\Supplier::add');
$routes->post('/finance/supplier/amz/create', 'Finance\Amz\Supplier::create');
$routes->get('/finance/supplier/amz/edit', 'Finance\Amz\Supplier::edit');
$routes->post('/finance/supplier/amz/update', 'Finance\Amz\Supplier::update');
$routes->get('/finance/supplier/amz/delete', 'Finance\Amz\Supplier::delete');

$routes->get('/finance/depo/add', 'Finance\Depo::add');
$routes->get('/finance/depo/add_image/(:num)', 'Finance\Depo::add_image/$1');
$routes->post('/finance/depo/create', 'Finance\Depo::create');
$routes->post('/finance/depo/create_upload', 'Finance\Depo::create_upload');
$routes->get('/finance/depo/cek_pending', 'Finance\Depo::Checkpending');
$routes->get('/finance/depo/data_transaksi', 'Finance\Depo::DataTransaksi');
