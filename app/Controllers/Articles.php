<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use CodeIgniter\Model;

class Articles extends BaseController
{
    // Declare the models used in this controller
    protected Model $articlesModel;
    protected Model $categoriesModel;

    // Constructor: Initialize models for articles and categories
    public function __construct()
    {
        $this->articlesModel = new ArticleModel();  // Instantiate ArticleModel to interact with articles data
        $this->categoriesModel = new CategoryModel();  // Instantiate CategoryModel to interact with categories data
    }

    // The method to display all articles
    public function index(): string
    {
        // Prepare data for the view
        $data['title'] = 'Articles | MaBlog';  // Set the title of the page
        $data['content'] = 'pages/articles/articles';  // Specify the view to be used for displaying articles
        $data['description'] = 'All articles of MaBlog';  // Meta description for SEO
        $data['keywords'] = 'blog, articles, posts, news';  // Meta keywords for SEO
        
        // Fetch all articles and categories from the models
        $data['articles'] = $this->articlesModel->getAllArticles();  // Get all articles from the database
        $data['categories'] = $this->categoriesModel->getAllCategories();  // Get all categories from the database

        // Prepend the "all" category to the list of categories for the filter
        array_unshift($data['categories'], ['name' => 'all', 'slug' => 'all']);

        // Render the main layout with the provided data
        return view('layouts/main', ['data' => $data]);
    }

    // Method to display articles by a specific category
    public function category($param): string
    {
        // Prepare data for the view
        $data['title'] = 'Articles | MaBlog';  // Set the title of the page
        $data['content'] = 'pages/articles/articles';  // View for listing articles
        $data['description'] = 'All articles of MaBlog categorized by ' . unslugify($param);  // Meta description
        $data['keywords'] = 'blog, articles, posts, news';  // Meta keywords for SEO

        // Get articles by the specified category (param)
        $data['articles'] = $this->articlesModel->getArticlesByCategory($param);  // Get articles filtered by category
        $data['categories'] = $this->categoriesModel->getAllCategories();  // Get all categories for category filter
        
        // If the "all" or empty category is selected, fetch all articles
        if ($param == '' || $param == 'all') {
            $data['articles'] = $this->articlesModel->getAllArticles();  // Get all articles if 'all' or empty category is chosen
        }
        
        // Add the "all" category to the category list if a category is selected
        if ($param != '') {
            array_unshift($data['categories'], ['name' => 'all', 'slug' => 'all']);
        }

        // Render the main layout with the provided data
        return view('layouts/main', ['data' => $data]);
    }

    // Method to display a single article based on its slug
    public function view($param): string
    {
        // Prepare data for the view
        $data['title'] = 'Article | MaBlog';  // Set the title for the article page
        $data['content'] = 'pages/articles/article';  // View for displaying a single article
        $data['description'] = 'Article of MaBlog';  // Meta description for SEO
        $data['keywords'] = 'blog, articles, posts, news';  // Meta keywords for SEO

        // Fetch the article by its slug
        $article = $this->articlesModel->getArticleBySlug($param);  // Get the article by its slug from the database

        // Generate a table of contents (TOC) for the article's body
        $toc_generate = generate_toc($article['body']);  // Generate the TOC from the article's body
        $article['body'] = $toc_generate['html'];  // Update the article's body with the TOC

        // Pass the TOC and article to the view
        $data['toc'] = $toc_generate['toc'];  // The generated TOC
        $data['article'] = $article;  // The article data

        // Render the main layout with the article data and TOC
        return view('layouts/main', ['data' => $data]);
    }
}
