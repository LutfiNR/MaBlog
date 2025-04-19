<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/articles', 'Articles::index');
$routes->get('/articles/(:any)', 'Articles::category/$1');

$routes->get('/article/(:any)', 'Articles::view/$1');

$routes->get('/about', 'About::index');
$routes->get('/contact', 'Contact::index');

//login
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::login');
$routes->get('/logout', 'Login::logout');
$routes->addRedirect('/admin', '/admin/dashboard');

$routes->group('', ['filter' => 'authentication'], function($routes) {    
    $routes->get('/admin/dashboard', 'Admin::index');

    $routes->get('/admin/articles', 'Admin::articles');
    $routes->get('/admin/article/create', 'Admin::createarticle');
    $routes->get('/admin/article/edit', 'Admin::editarticle');
    $routes->get('/admin/article/delete', 'Admin::deletearticle');
    $routes->get('/admin/categories', 'Admin::categories');
});

