<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index'); // Protect homepage
$routes->get('/login', 'Auth::index'); // Show login form
$routes->post('/login', 'Auth::login'); // Process login

$routes->get('/articles', 'Article::index'); // Get all articles
$routes->get('/article/(:num)', 'Article::view/$1'); // Get a single article by ID
$routes->get('/articles/search', 'Article::search'); // Search articles
$routes->get('/articles/category/(:any)', 'Article::filterByCategory/$1'); // Filter articles by category

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/admin', 'Admin::index'); // Admin dashboard
    $routes->get('/admin/articles', 'Admin::articles'); // View all articles (admin)
    $routes->get('/admin/article/new', 'Admin::create'); // Show form to create an article
    $routes->post('/admin/article', 'Admin::store'); // Store a new article
    $routes->get('/admin/article/edit/(:num)', 'Admin::edit/$1'); // Show edit form
    $routes->post('/admin/article/update/(:num)', 'Admin::update/$1'); // Update article
    $routes->get('/admin/article/delete/(:num)', 'Admin::delete/$1'); // Delete article
});

