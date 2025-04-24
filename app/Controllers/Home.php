<?php

namespace App\Controllers;
use App\Models\ArticleModel;

class Home extends BaseController
{
    // This method is called when the home page is accessed
    public function index(): string
    {
        // Instantiate the ArticleModel
        $articleModel = new ArticleModel();

        // Prepare data for the homepage view
        $data['title'] = 'MaBlog';  // The title for the homepage (used in the browser's title bar)
        $data['content'] = 'pages/home';  // The view file to be used for the homepage
        $data['description'] = 'MaBlog is a simple blog application';  // SEO description for the homepage
        $data['keywords'] = 'blog, articles, posts, news';  // SEO keywords for the homepage

        // Retrieve data from the model
        $data['articles'] = $articleModel->getAllArticles();  // Fetch all articles from the database
        $data['lastArticle'] = $articleModel->getLastArticle();  // Fetch the most recent article
        $data['featuredArticles'] = $articleModel->getArticleIsFeatures();  // Fetch featured articles

        // Render the main layout and pass the data to the view
        return view('layouts/main', ['data' => $data]);
    }
}
