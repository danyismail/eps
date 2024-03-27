<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setAutoRoute(true);

$routes->get('(:any)/ceksaldo', 'Deposit::GetSupplierBalance/$1');
$routes->get('(:any)/penjualan/periode', 'Sales::GetSalesByDate/$1');
$routes->get('(:any)/penjualan', 'Sales::GetSales/$1');

$routes->get('/', 'Kpi::index/da');
$routes->get('(:any)/kpi', 'Kpi::index/$1');


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

$routes->get('/finance/deposit/eps/add', 'Finance\Eps\Deposit::add');
$routes->get('/finance/deposit/eps/add_image/(:num)', 'Finance\Eps\Deposit::add_image/$1');
$routes->get('/finance/deposit/eps/add_reply/(:num)', 'Finance\Eps\Deposit::add_reply/$1');
$routes->post('/finance/deposit/eps/create', 'Finance\Eps\Deposit::create');
$routes->post('/finance/deposit/eps/create_upload', 'Finance\Eps\Deposit::create_upload');
$routes->post('/finance/deposit/eps/action_reply', 'Finance\Eps\Deposit::action_reply');
$routes->get('/finance/deposit/eps/cek_pending', 'Finance\Eps\Deposit::Checkpending');
$routes->get('/finance/deposit/eps/data_transaksi', 'Finance\Eps\Deposit::DataTransaksi');
$routes->get('/finance/deposit/eps/cancel', 'Finance\Eps\Deposit::Cancel');
$routes->get('/finance/deposit/eps/delete_deposit/(:num)', 'Finance\Eps\Deposit::DeleteDeposit/$1');

$routes->get('/finance/deposit/amz/add', 'Finance\Amz\Deposit::add');
$routes->get('/finance/deposit/amz/add_image/(:num)', 'Finance\Amz\Deposit::add_image/$1');
$routes->get('/finance/deposit/amz/add_reply/(:num)', 'Finance\Amz\Deposit::add_reply/$1');
$routes->post('/finance/deposit/amz/create', 'Finance\Amz\Deposit::create');
$routes->post('/finance/deposit/amz/create_upload', 'Finance\Amz\Deposit::create_upload');
$routes->post('/finance/deposit/amz/action_reply', 'Finance\Amz\Deposit::action_reply');
$routes->get('/finance/deposit/amz/cek_pending', 'Finance\Amz\Deposit::Checkpending');
$routes->get('/finance/deposit/amz/data_transaksi', 'Finance\Amz\Deposit::DataTransaksi');
$routes->get('/finance/deposit/amz/cancel', 'Finance\Amz\Deposit::Cancel');
$routes->get('/finance/deposit/amz/delete_deposit/(:num)', 'Finance\Amz\Deposit::DeleteDeposit/$1');
