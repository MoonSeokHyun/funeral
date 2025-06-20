<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('funerals', 'FuneralFacility::index');
$routes->get('funerals/(:num)', 'FuneralFacility::detail/$1');


$routes->get('sitemap.xml', 'SitemapController::index');
$routes->get('sitemap/generate/(:segment)/(:num)', 'SitemapController::generate/$1/$2');
