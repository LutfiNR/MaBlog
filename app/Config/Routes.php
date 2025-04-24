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
    $routes->get('/admin/dashboard', 'AdminDashboard::dashboard');

    $routes->get('/admin/articles', 'AdminArticles::articles');
    $routes->get('/admin/article/create', 'AdminArticles::createarticle');
    $routes->post('/admin/article/create', 'AdminArticles::storearticle');
    $routes->get('/admin/article/edit/(:num)', 'AdminArticles::editarticle/$1');
    $routes->post('/admin/article/edit/(:num)', 'AdminArticles::updatearticle/$1');
    $routes->get('/admin/article/delete/(:num)', 'AdminArticles::deletearticle/$1');

    $routes->get('/admin/categories', 'AdminCategories::categories');
    $routes->get('/admin/category/create/', 'AdminCategories::createcategory');
    $routes->post('/admin/category/create/', 'AdminCategories::storecategory');
    $routes->get('/admin/category/edit/(:num)', 'AdminCategories::editcategory/$1');
    $routes->post('/admin/category/edit/(:num)', 'AdminCategories::updatecategory/$1');
    $routes->get('/admin/category/delete/(:num)', 'AdminCategories::deletecategory/$1');
});

