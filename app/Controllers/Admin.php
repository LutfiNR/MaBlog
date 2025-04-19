<?php
namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use CodeIgniter\Model;

class Admin extends BaseController
{
    protected Model $articleModel;
    protected Model $categoryModel;

    protected Model $userModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
    }
    public function index(): string
    {
        $data['title'] = 'Admin | MaBlog';
        $data['content'] = 'pages/admin/dashboard';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';
        
        //get user matching with session
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));
        $data['user'] = $user;

        //get total articles
        $data['total_articles'] = $this->articleModel->countAll();

        //get toparticles
        $data['top_articles'] = $this->articleModel->getAllArticles('desc', 6,'visited');
    
        return view('layouts/admin/main', ['data' => $data], );
    }

    public function articles(): string
    {
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));
        $data['user'] = $user;
        $data['title'] = 'Admin Articles | MaBlog';
        $data['content'] = 'pages/admin/articles';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        return view('layouts/admin/main', ['data' => $data], );
    }
    public function categories(): string
    {
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));
        $data['user'] = $user;
        $data['title'] = 'Admin Categories | MaBlog';
        $data['content'] = 'pages/admin/categories';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        return view('layouts/admin/main', ['data' => $data], );
    }
}
