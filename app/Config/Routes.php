<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/addBarang', 'Home::addBarang');
$routes->post('/addBarang', 'Home::addBarang');
$routes->get('/about', 'Home::about');
