<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Kpi::index');
$routes->get('/supplier', 'Deposit::index');
$routes->get('/sales', 'Sales::index');
$routes->get('/sales-periode', 'Sales::salesPeriode');
// $routes->get('/', 'Home::getProduct');
// $routes->post('/', 'Home::getProduct');
