<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Kpi::index');
$routes->get('/amazon-kpi', 'Kpi::get_kpi');
$routes->get('/supplier', 'Deposit::index');
$routes->get('/amazon-supplier', 'Deposit::get_deposit');
$routes->get('/sales', 'Sales::index');
$routes->get('/amazon-sales', 'Sales::get_sales');
$routes->get('/sales-periode', 'Sales::salesPeriode');
$routes->get('/amazon-sales-periode', 'Sales::get_sales_periode');
