<?php
namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use CodeIgniter\Model;

class AdminCategories extends BaseController
{
    protected Model $categoryModel;

    protected Model $userModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
    }

    public function categories(): string
    {
        $data['title'] = 'Admin Categories | MaBlog';
        $data['content'] = 'pages/admin/categories';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));

        $data['user'] = $user;
        $data['categories'] = $this->categoryModel->getAllCategories();

        return view('layouts/admin/main', ['data' => $data], );
    }
    //create category
    public function createcategory(): string
    {
        $data['title'] = 'Admin Create Category | MaBlog';
        $data['content'] = 'pages/admin/edit_category';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));

        $data['user'] = $user;

        return view('layouts/admin/main', ['data' => $data], );
    }
    //store category
    public function storecategory()
    {
        //get data from form
        $data = [
            'name' => $this->request->getPost('name'),
        ];

        //insert category in model if true pass status success
        if ($this->categoryModel->createCategory($data)) {
            return redirect()->to('/admin/categories')->with('status', 'Create Success');
        } else {
            return redirect()->to('/admin/categories')->with('status', 'error');
        }
    }
    //edit category
    public function editcategory($id): string
    {
        $data['title'] = 'Admin Edit Category | MaBlog';
        $data['content'] = 'pages/admin/edit_category';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        $session = session();
        $user = $this->userModel->getUserByUsername($session->get('username'));
        $data['category'] = $this->categoryModel->getCategoryById($id);

        $data['user'] = $user;

        return view('layouts/admin/main', ['data' => $data], );
    }
    //update category
    public function updatecategory($id)
    {
        //get data from form
        $data = [
            'name' => $this->request->getPost('name'),
            // 'slug' => slugify($this->request->getPost('name')),
        ];

        //update category in model if true pass status success
        if ($this->categoryModel->updateCategory($id, $data)) {
            return redirect()->to('/admin/categories')->with('status', 'Update Success');
        } else {
            return redirect()->to('/admin/categories')->with('status', 'error');
        }
    }
    //delete category
    public function deletecategory($id)
    {
        //delete category from model if true pass status success
        if ($this->categoryModel->deleteCategory($id)) {
            return redirect()->to('/admin/categories')->with('status', 'Delete Success');
        } else {
            return redirect()->to('/admin/categories')->with('status', 'error');
        }
    }
}
