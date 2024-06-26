<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/addBarang', 'Home::addBarang');
$routes->get('/viewBarang/(:any)', 'Home::viewBarang/$1');
$routes->post('/addBarang', 'Home::addBarang');
$routes->delete('/deleteBarang/(:any)', 'Home::deleteBarang/$1');
$routes->add('/updateBarang/(:any)', 'Home::updateBarang/$1');
$routes->get('/about', 'Home::about');
