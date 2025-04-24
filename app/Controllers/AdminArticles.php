<?php
namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use App\Models\ArticleCategoryModel;
use CodeIgniter\Model;

class AdminArticles extends BaseController
{
    protected Model $articleModel;
    protected Model $categoryModel;

    protected Model $userModel;

    protected Model $articleCategoryModel;

    public function __construct()
    {
        $this->articleModel = new ArticleModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
        $this->articleCategoryModel = new ArticleCategoryModel();
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

        $data['articles'] = $this->articleModel->getAllArticles();

        return view('layouts/admin/main', ['data' => $data], );
    }

    public function createarticle(): string
    {
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));
        $data['user'] = $user;
        $data['title'] = 'Admin Create Article | MaBlog';
        $data['content'] = 'pages/admin/form_article';
        $data['description'] = 'Admin page for creating articles.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        $data['article'] = [];
        $data['categories'] = $this->categoryModel->getAllCategories();

        return view('layouts/admin/main', ['data' => $data], );
    }
    public function storearticle()
    {
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));
        $data['user'] = $user;
        // return json_encode([
            if ($this->articleModel->addArticle([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'body' => $this->request->getPost('body'),
                'readingtime' => $this->request->getPost('readingtime'),
                'is_featured' => $this->request->getPost('is_featured'),
                'image_src' => $this->request->getPost('image'),
                'visited' => 0,
                'author_id' => $user['id'],
                'created_at' => date('Y-m-d H:i:s',time() + 7 * 60 * 60),
                'updated_at' => date('Y-m-d H:i:s',time() + 7 * 60 * 60),
                'slug' => slugify($this->request->getPost('title')),
        // ]);
            ])) {
                // Store in article_categories table
                $articleId = $this->articleModel->insertID();
                $categories = $this->request->getPost('categories');
                if ($categories) {
                    foreach ($categories as $categoryId) {
                        $this->articleCategoryModel->addArticleCategory($articleId, $categoryId);
                    }
                }
                return redirect()->to('/admin/articles')->with('status', 'Article created successfully');
            } else {
                return redirect()->to('/admin/articles')->with('error', 'Failed to create article');
            }
    }

    public function editarticle($id): string
    {
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));
        $data['user'] = $user;
        $data['title'] = 'Admin Edit Article | MaBlog';
        $data['content'] = 'pages/admin/form_article';
        $data['description'] = 'Admin page for editing articles.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        $data['categories'] = $this->categoryModel->getAllCategories();
        $data['article'] = $this->articleModel->getArticleById($id);

        return view('layouts/admin/main', ['data' => $data], );
    }
    public function updatearticle($id)
    {
        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));
        $data['user'] = $user;

        if ($this->articleModel->updateArticle($id, [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'body' => $this->request->getPost('body'),
            'reading_time' => $this->request->getPost('readingtime'),
            'is_featured' => $this->request->getPost('is_featured'),
            'image_src' => $this->request->getPost('image'),
            'updated_at' => date('Y-m-d H:i:s',time() + 7 * 60 * 60),
            'slug' => slugify($this->request->getPost('title')),
        ])) {
            // Update in article_categories table
            $categories = $this->request->getPost('categories');
            if ($categories) {
                // Delete existing categories for the article
                $this->articleCategoryModel->deleteArticleCategories($id);
                // Insert new categories
                foreach ($categories as $categoryId) {
                    $this->articleCategoryModel->addArticleCategory($id, $categoryId);
                }
            }
            return redirect()->to('/admin/articles')->with('status', 'Update Success');
        } else {
            return redirect()->to('/admin/articles')->with('status', 'error');
        }
    }
    
    public function deletearticle($id)
    {
        if ($this->articleModel->deleteArticle($id)) {
            return redirect()->to('/admin/articles')->with('status', 'Delete Success');
        } else {
            return redirect()->to('/admin/articles')->with('status', 'error');
        }
    }
}
