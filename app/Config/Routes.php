<?php 

// Importing the RouteCollection class from CodeIgniter for defining routes
use CodeIgniter\Router\RouteCollection;  

/**  
 * @var RouteCollection $routes  // Defining the routes variable which will be used to define URL patterns
 */

// Public Routes
$routes->get('/', 'Home::index');  // Home page (GET request maps to Home controller's index method)
$routes->get('/articles', 'Articles::index');  // Articles listing page (GET request maps to Articles controller's index method)
$routes->get('/articles/(:any)', 'Articles::category/$1');  // Category-specific articles (dynamic category, maps to category method in Articles controller)
$routes->get('/article/(:any)', 'Articles::view/$1');  // View a specific article (dynamic article ID, maps to view method in Articles controller)
$routes->get('/about', 'About::index');  // About page (GET request maps to About controller's index method)
$routes->get('/contact', 'Contact::index');  // Contact page (GET request maps to Contact controller's index method)

// Login Routes
$routes->get('/login', 'Login::index');  // Login form page (GET request maps to Login controller's index method)
$routes->post('/login', 'Login::login');  // Process login form submission (POST request maps to Login controller's login method)
$routes->get('/logout', 'Login::logout');  // Logout action (GET request maps to Login controller's logout method)

// Redirect to /admin/dashboard if /admin is accessed directly
$routes->addRedirect('/admin', '/admin/dashboard');  

// Admin Routes (Protected by 'authentication' filter - requires user to be logged in)
$routes->group('', ['filter' => 'authentication'], function($routes) {
    
    // Admin Dashboard
    $routes->get('/admin/dashboard', 'AdminDashboard::dashboard');  // Admin dashboard page (GET request maps to AdminDashboard controller's dashboard method)
    
    // Article Management Routes (Admin-only actions)
    $routes->get('/admin/articles', 'AdminArticles::articles');  // List of all articles (GET request maps to AdminArticles controller's articles method)
    $routes->get('/admin/article/create', 'AdminArticles::createarticle');  // Create new article form (GET request maps to AdminArticles controller's createarticle method)
    $routes->post('/admin/article/create', 'AdminArticles::storearticle');  // Store a new article (POST request maps to AdminArticles controller's storearticle method)
    $routes->get('/admin/article/edit/(:num)', 'AdminArticles::editarticle/$1');  // Edit existing article (GET request with article ID, maps to AdminArticles controller's editarticle method)
    $routes->post('/admin/article/edit/(:num)', 'AdminArticles::updatearticle/$1');  // Update existing article (POST request with article ID, maps to AdminArticles controller's updatearticle method)
    $routes->get('/admin/article/delete/(:num)', 'AdminArticles::deletearticle/$1');  // Delete an article (GET request with article ID, maps to AdminArticles controller's deletearticle method)
    
    // Category Management Routes (Admin-only actions)
    $routes->get('/admin/categories', 'AdminCategories::categories');  // List of all categories (GET request maps to AdminCategories controller's categories method)
    $routes->get('/admin/category/create/', 'AdminCategories::createcategory');  // Create new category form (GET request maps to AdminCategories controller's createcategory method)
    $routes->post('/admin/category/create/', 'AdminCategories::storecategory');  // Store a new category (POST request maps to AdminCategories controller's storecategory method)
    $routes->get('/admin/category/edit/(:num)', 'AdminCategories::editcategory/$1');  // Edit existing category (GET request with category ID, maps to AdminCategories controller's editcategory method)
    $routes->post('/admin/category/edit/(:num)', 'AdminCategories::updatecategory/$1');  // Update existing category (POST request with category ID, maps to AdminCategories controller's updatecategory method)
    $routes->get('/admin/category/delete/(:num)', 'AdminCategories::deletecategory/$1');  // Delete category (GET request with category ID, maps to AdminCategories controller's deletecategory method)
});

