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
$routes->get('/eps/supplier', 'Eps\Supplier::index');
$routes->get('/eps/supplier/add', 'Eps\Supplier::add');
$routes->post('/eps/supplier/create', 'Eps\Supplier::create');
$routes->get('/eps/supplier/status', 'Eps\Supplier::status');
$routes->get('/eps/supplier/edit', 'Eps\Supplier::edit');
$routes->post('/eps/supplier/update', 'Eps\Supplier::update');
$routes->get('/eps/supplier/delete', 'Eps\Supplier::delete');

$routes->get('/AmZ/kpi', 'Kpi::get_kpi');
$routes->get('/AmZ/RekapSpl', 'Deposit::get_deposit');
$routes->get('/AmZ/Rect', 'Sales::get_sales');
$routes->get('/AmZ/Rect/periode', 'Sales::get_sales_periode');
$routes->get('/amz/supplier', 'Amz\Supplier::index');
$routes->get('/amz/supplier/add', 'Amz\Supplier::add');
$routes->post('/amz/supplier/create', 'Amz\Supplier::create');
$routes->get('/amz/supplier/status', 'Amz\Supplier::status');
$routes->get('/amz/supplier/edit', 'Amz\Supplier::edit');
$routes->post('/amz/supplier/update', 'Amz\Supplier::update');
$routes->get('/amz/supplier/delete', 'Amz\Supplier::delete');
