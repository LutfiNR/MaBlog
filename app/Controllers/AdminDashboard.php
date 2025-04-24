<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\UserModel;
use CodeIgniter\Model;

class AdminDashboard extends BaseController
{
    // Declare the models used in this controller
    protected Model $articleModel;
    protected Model $userModel;

    // Constructor to initialize the models
    public function __construct()
    {
        $this->articleModel = new ArticleModel();  // Instantiate the ArticleModel
        $this->userModel = new UserModel();  // Instantiate the UserModel
    }

    // Method to display the admin dashboard
    public function dashboard(): string
    {
        // Set up the data for the view
        $data['title'] = 'Admin | MaBlog';  // Page title
        $data['content'] = 'pages/admin/dashboard';  // View to display the dashboard
        $data['description'] = 'Admin page for managing the blog.';  // Meta description
        $data['keywords'] = 'admin, blog, articles, posts, news';  // Meta keywords

        // Get the user information from the session
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));  // Fetch the user by username from the session
        $data['user'] = $user;  // Add user data to the view

        // Get the total number of articles in the database
        $data['total_articles'] = $this->articleModel->countAll();  // Get total count of articles

        // Get the top 6 most visited articles (sorted by visits in descending order)
        $data['top_articles'] = $this->articleModel->getAllArticles('desc', 6, 'visited');  // Fetch top 6 articles by visited count

        // Return the main layout with the dashboard data
        return view('layouts/admin/main', ['data' => $data]);
    }
}
