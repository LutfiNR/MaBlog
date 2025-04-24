<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use App\Models\ArticleCategoryModel;
use CodeIgniter\Model;

class AdminArticles extends BaseController
{
    // Define the models used within the controller
    protected Model $articleModel;
    protected Model $categoryModel;
    protected Model $userModel;
    protected Model $articleCategoryModel;

    // Constructor to initialize models
    public function __construct()
    {
        $this->articleModel = new ArticleModel(); // Instantiate ArticleModel
        $this->categoryModel = new CategoryModel(); // Instantiate CategoryModel
        $this->userModel = new UserModel(); // Instantiate UserModel
        $this->articleCategoryModel = new ArticleCategoryModel(); // Instantiate ArticleCategoryModel
    }

    // Method to list all articles in the admin panel
    public function articles(): string
    {
        $session = session();  // Access the current session
        $user = $this->userModel->getUserByUsername($session->get('username'));  // Get user by username from session
        $data['user'] = $user;  // Assign user data to be passed to the view
        $data['title'] = 'Admin Articles | MaBlog';  // Set the title of the page
        $data['content'] = 'pages/admin/articles';  // Specify the view to be used
        $data['description'] = 'Admin page for managing the blog.';  // Meta description
        $data['keywords'] = 'admin, blog, articles, posts, news';  // Meta keywords

        // Fetch all articles from the ArticleModel
        $data['articles'] = $this->articleModel->getAllArticles();

        // Return the view with the data
        return view('layouts/admin/main', ['data' => $data]);
    }

    // Method to display the form for creating a new article
    public function createarticle(): string
    {
        $session = session();  // Access the current session
        $user = $this->userModel->getUserByUsername($session->get('username'));  // Get user by username from session
        $data['user'] = $user;  // Assign user data to be passed to the view
        $data['title'] = 'Admin Create Article | MaBlog';  // Set the title of the page
        $data['content'] = 'pages/admin/form_article';  // Specify the view for the article creation form
        $data['description'] = 'Admin page for creating articles.';  // Meta description
        $data['keywords'] = 'admin, blog, articles, posts, news';  // Meta keywords

        // Fetch all categories from CategoryModel to display in the form
        $data['categories'] = $this->categoryModel->getAllCategories();

        // Return the view with the data
        return view('layouts/admin/main', ['data' => $data]);
    }

    // Method to store a newly created article in the database
    public function storearticle()
    {
        $session = session();  // Access the current session
        $user = $this->userModel->getUserByUsername($session->get('username'));  // Get user by username from session
        $data['user'] = $user;  // Assign user data to be passed to the view

        // Create the article using ArticleModel
        if ($this->articleModel->addArticle([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'body' => $this->request->getPost('body'),
            'readingtime' => $this->request->getPost('readingtime'),
            'is_featured' => $this->request->getPost('is_featured'),
            'image_src' => $this->request->getPost('image'),
            'visited' => 0,
            'author_id' => $user['id'],
            'created_at' => date('Y-m-d H:i:s', time() + 7 * 60 * 60),  // Set time zone to UTC+7
            'updated_at' => date('Y-m-d H:i:s', time() + 7 * 60 * 60),
            'slug' => slugify($this->request->getPost('title')),  // Generate slug from title
        ])) {
            // Get the article ID and categories, then store them in the article_categories table
            $articleId = $this->articleModel->insertID();  // Get the last inserted article ID
            $categories = $this->request->getPost('categories');  // Get the selected categories

            if ($categories) {
                // Loop through selected categories and add them to article_categories
                foreach ($categories as $categoryId) {
                    $this->articleCategoryModel->addArticleCategory($articleId, $categoryId);
                }
            }

            // Redirect back to articles list with success message
            return redirect()->to('/admin/articles')->with('status', 'Article created successfully');
        } else {
            // Redirect back to articles list with error message if creation fails
            return redirect()->to('/admin/articles')->with('error', 'Failed to create article');
        }
    }

    // Method to display the form for editing an existing article
    public function editarticle($id): string
    {
        $session = session();  // Access the current session
        $user = $this->userModel->getUserByUsername($session->get('username'));  // Get user by username from session
        $data['user'] = $user;  // Assign user data to be passed to the view
        $data['title'] = 'Admin Edit Article | MaBlog';  // Set the title of the page
        $data['content'] = 'pages/admin/form_article';  // Specify the view for the article edit form
        $data['description'] = 'Admin page for editing articles.';  // Meta description
        $data['keywords'] = 'admin, blog, articles, posts, news';  // Meta keywords

        // Fetch all categories and the article to be edited
        $data['categories'] = $this->categoryModel->getAllCategories();
        $data['article'] = $this->articleModel->getArticleById($id);  // Fetch the article by ID

        // Return the view with the data
        return view('layouts/admin/main', ['data' => $data]);
    }

    // Method to update an existing article
    public function updatearticle($id)
    {
        $session = session();  // Access the current session
        $user = $this->userModel->getUserByUsername($session->get('username'));  // Get user by username from session
        $data['user'] = $user;  // Assign user data to be passed to the view

        // Update the article in the database
        if ($this->articleModel->updateArticle($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'body' => $this->request->getPost('body'),
            'reading_time' => $this->request->getPost('readingtime'),
            'is_featured' => $this->request->getPost('is_featured'),
            'image_src' => $this->request->getPost('image'),
            'updated_at' => date('Y-m-d H:i:s', time() + 7 * 60 * 60),  // Set updated timestamp
            'slug' => slugify($this->request->getPost('title')),  // Update slug
        ])) {
            // Update categories in the article_categories table
            $categories = $this->request->getPost('categories');
            if ($categories) {
                $this->articleCategoryModel->deleteArticleCategories($id);  // Delete old categories
                // Add new categories to article_categories table
                foreach ($categories as $categoryId) {
                    $this->articleCategoryModel->addArticleCategory($id, $categoryId);
                }
            }

            // Redirect back to articles list with success message
            return redirect()->to('/admin/articles')->with('status', 'Update Success');
        } else {
            // Redirect with error message if update fails
            return redirect()->to('/admin/articles')->with('status', 'Error');
        }
    }

    // Method to delete an article
    public function deletearticle($id)
    {
        if ($this->articleModel->deleteArticle($id)) {
            // Redirect back to articles list with success message if deletion is successful
            return redirect()->to('/admin/articles')->with('status', 'Delete Success');
        } else {
            // Redirect with error message if deletion fails
            return redirect()->to('/admin/articles')->with('status', 'Error');
        }
    }
}
