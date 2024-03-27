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
$routes->get('(:any)/kpi/list', 'Kpi::GetAll/$1');

$routes->get('/supplier/(:any)/list', 'Finance\Supplier::GetAll/$1');
$routes->get('/supplier/(:any)/status', 'Finance\Supplier::Update/$1');
$routes->get('/supplier/(:any)/add', 'Finance\Supplier::Add/$1');
$routes->post('/supplier/(:any)/create', 'Finance\Supplier::Create/$1');
$routes->get('/supplier/(:any)/edit', 'Finance\Supplier::Edit/$1');
$routes->post('/supplier/(:any)/update', 'Finance\Supplier::Update/$1');
$routes->get('/supplier/(:any)/delete', 'Finance\Supplier::Delete/$1');

$routes->get('/deposit/(:any)/add', 'Finance\Deposit::Add/$1');
$routes->post('/deposit/(:any)/create', 'Finance\Deposit::Create/$1');
$routes->get('/deposit/(:any)/cek_pending', 'Finance\Deposit::CheckPending/$1');
$routes->get('/deposit/(:any)/data_transaksi', 'Finance\Deposit::DataTransaksi/$1');
$routes->get('/deposit/(:any)/form_upload/(:num)', 'Finance\Deposit::GetDepositById/$1/$2');
$routes->get('/deposit/(:any)/add_reply/(:num)', 'Finance\Deposit::AddReply/$1/$2');
$routes->post('/deposit/(:any)/action_upload', 'Finance\Deposit::CreateUpload/$1');
$routes->post('/deposit/(:any)/action_reply', 'Finance\Deposit::ActionReply/$1');
$routes->get('/deposit/(:any)/cancel', 'Finance\Deposit::Cancel/$1');
$routes->get('/deposit/(:any)/delete_deposit/(:num)', 'Finance\Deposit::DeleteDeposit/$1/$2');
