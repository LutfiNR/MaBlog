<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\UserModel;
use CodeIgniter\Model;

class AdminCategories extends BaseController
{
    // Define the models used in this controller
    protected Model $categoryModel;
    protected Model $userModel;

    // Constructor to initialize models
    public function __construct()
    {
        $this->categoryModel = new CategoryModel(); // Instantiate the CategoryModel
        $this->userModel = new UserModel(); // Instantiate the UserModel
    }

    // Method to display all categories in the admin panel
    public function categories(): string
    {
        // Set up the data for the view
        $data['title'] = 'Admin Categories | MaBlog';  // Page title
        $data['content'] = 'pages/admin/categories';  // View to display categories
        $data['description'] = 'Admin page for managing the blog categories.';  // Meta description
        $data['keywords'] = 'admin, blog, categories, articles, posts, news';  // Meta keywords

        // Get the current user from session
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));  // Fetch user by username from session

        $data['user'] = $user;  // Add user data to the view
        $data['categories'] = $this->categoryModel->getAllCategories();  // Get all categories

        // Return the view with the data
        return view('layouts/admin/main', ['data' => $data]);
    }

    // Method to display the form for creating a new category
    public function createcategory(): string
    {
        // Set up the data for the view
        $data['title'] = 'Admin Create Category | MaBlog';  // Page title
        $data['content'] = 'pages/admin/edit_category';  // View for creating/editing categories
        $data['description'] = 'Admin page for creating new categories.';  // Meta description
        $data['keywords'] = 'admin, blog, categories, articles, posts, news';  // Meta keywords

        // Get the current user from session
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));  // Fetch user by username from session

        $data['user'] = $user;  // Add user data to the view

        // Return the view for creating a new category
        return view('layouts/admin/main', ['data' => $data]);
    }

    // Method to store a new category in the database
    public function storecategory()
    {
        // Get category name from the form input
        $data = [
            'name' => $this->request->getPost('name'),  // Category name from POST request
        ];

        // Insert the new category using the CategoryModel
        if ($this->categoryModel->createCategory($data)) {
            // Redirect to the categories page with success message if category is created successfully
            return redirect()->to('/admin/categories')->with('status', 'Create Success');
        } else {
            // Redirect to the categories page with error message if category creation fails
            return redirect()->to('/admin/categories')->with('status', 'Error');
        }
    }

    // Method to display the form for editing an existing category
    public function editcategory($id): string
    {
        // Set up the data for the view
        $data['title'] = 'Admin Edit Category | MaBlog';  // Page title
        $data['content'] = 'pages/admin/edit_category';  // View for editing categories
        $data['description'] = 'Admin page for editing categories.';  // Meta description
        $data['keywords'] = 'admin, blog, categories, articles, posts, news';  // Meta keywords

        // Get the current user from session
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));  // Fetch user by username from session
        $data['category'] = $this->categoryModel->getCategoryById($id);  // Get category details by ID

        $data['user'] = $user;  // Add user data to the view

        // Return the view for editing the category
        return view('layouts/admin/main', ['data' => $data]);
    }

    // Method to update an existing category in the database
    public function updatecategory($id)
    {
        // Get category name from the form input
        $data = [
            'name' => $this->request->getPost('name'),  // Category name from POST request
        ];

        // Update the category using CategoryModel
        if ($this->categoryModel->updateCategory($id, $data)) {
            // Redirect to the categories page with success message if category is updated successfully
            return redirect()->to('/admin/categories')->with('status', 'Update Success');
        } else {
            // Redirect to the categories page with error message if category update fails
            return redirect()->to('/admin/categories')->with('status', 'Error');
        }
    }

    // Method to delete a category from the database
    public function deletecategory($id)
    {
        // Delete the category using CategoryModel
        if ($this->categoryModel->deleteCategory($id)) {
            // Redirect to the categories page with success message if category is deleted successfully
            return redirect()->to('/admin/categories')->with('status', 'Delete Success');
        } else {
            // Redirect to the categories page with error message if category deletion fails
            return redirect()->to('/admin/categories')->with('status', 'Error');
        }
    }
}
