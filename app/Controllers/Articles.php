<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use CodeIgniter\Model;


class Articles extends BaseController
{
    protected Model $articlesModel;
    protected Model $categoriesModel;

    // Constructor
    public function __construct()
    {
        $this->articlesModel = new ArticleModel();
        $this->categoriesModel = new CategoryModel();
    }

    public function index(): string
    {
        // Prepare data for the view
        $data['title'] = 'Articles | MaBlog';
        $data['content'] = 'pages/articles/articles';
        $data['description'] = 'All articles of MaBlog';
        $data['keywords'] = 'blog, articles, posts, news';
        
        $data['articles'] = $this->articlesModel->getAllArticles();
        $data['categories'] = $this->categoriesModel->getAllCategories();
        array_unshift($data['categories'], ['name' => 'all', 'slug' => 'all']);

        return view('layouts/main', ['data' => $data]);
    }

    public function category($param): string
    {
        $data['title'] = 'Articles | MaBlog';
        $data['content'] = 'pages/articles/articles';
        $data['description'] = 'All articles of MaBlog categorized by ' . unslugify($param);
        $data['keywords'] = 'blog, articles, posts, news';

        $data['articles'] = $this->articlesModel->getArticlesByCategory($param);
        $data['categories'] = $this->categoriesModel->getAllCategories();
        
        if ($param == '' || $param == 'all') {
            $data['articles'] = $this->articlesModel->getAllArticles();
        }
        if ($param != '') {
            array_unshift($data['categories'], ['name' => 'all', 'slug' => 'all']);
        }
        return view('layouts/main', ['data' => $data]);
    }

    public function view($param): string
    {
        $data['title'] = 'Article | MaBlog';
        $data['content'] = 'pages/articles/article';
        $data['description'] = 'Article of MaBlog';
        $data['keywords'] = 'blog, articles, posts, news';

        $article = $this->articlesModel->getArticleBySlug($param);

        $toc_generate = generate_toc($article['body']);
        $article['body'] = $toc_generate['html'];

        $data['toc'] = $toc_generate['toc'];
        $data['article'] = $article;

        return view('layouts/main', ['data' => $data]);
    }
}
