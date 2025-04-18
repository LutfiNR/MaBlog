<?php

namespace App\Controllers;
use App\Models\ArticleModel;

class Home extends BaseController
{
    public function index(): string
    {
        $articleModel = new ArticleModel();

        $data['title'] = 'MaBlog';
        $data['content'] = 'pages/home';
        $data['description'] = 'MaBlog is a simple blog application';
        $data['keywords'] = 'blog, articles, posts, news';
        
        $data['articles'] = $articleModel->getAllArticles();
        $data['lastArticle'] = $articleModel->getLastArticle();
        $data['featuredArticles'] = $articleModel->getArticleIsFeatures();

        return view('layouts/main', ['data' => $data]);
    }
}
