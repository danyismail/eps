<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setAutoRoute(true);
$routes->get('/', 'Kpi::index');
$routes->get('/ePS/kpi', 'Kpi::index');
$routes->get('/AmZ/kpi', 'Kpi::get_kpi');
$routes->get('/ePS/RekapSpl', 'Deposit::index');
$routes->get('/AmZ/RekapSpl', 'Deposit::get_deposit');
$routes->get('/ePS/Rect', 'Sales::index');
$routes->get('/AmZ/Rect', 'Sales::get_sales');
$routes->get('/ePS/Rect/periode', 'Sales::salesPeriode');
$routes->get('/AmZ/Rect/periode', 'Sales::get_sales_periode');
