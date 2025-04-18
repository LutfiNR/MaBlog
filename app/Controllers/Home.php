<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        $data['title'] = 'MaBlog';
        $data['content'] = 'pages/home';
        $data['description'] = 'MaBlog is a simple blog application';
        $data['keywords'] = 'blog, articles, posts, news';

        $sortedArticles = $this->articles;

        usort($sortedArticles, function ($a, $b) {
            return strtotime($b['published_at']) <=> strtotime($a['published_at']);
        });

        $featured = array_filter($this->articles, function ($article) {
            return isset($article['is_featured']) && $article['is_featured'] === true;
        });
        
        $data['articles'] = $sortedArticles;
        $data['lastArticle'] = end($this->articles);
        $data['featuredArticles'] = array_slice($featured, 0, 4);


        // return json_encode($data['featuredArticles']);
        return view('layouts/main', ['data' => $data]);
    }
}
