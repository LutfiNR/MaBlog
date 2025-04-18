<?php

namespace App\Controllers;

class Articles extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Articles | MaBlog';
        $data['content'] = 'pages/articles/articles';
        $data['description'] = 'All articles of MaBlog';
        $data['keywords'] = 'blog, articles, posts, news';
        $sortedArticles = $this->articles;

        usort($sortedArticles, function ($a, $b) {
            return strtotime($b['published_at']) <=> strtotime($a['published_at']);
        });

        $featured = array_filter($this->articles, function ($article) {
            return isset($article['is_featured']) && $article['is_featured'] === true;
        });

        $data['articles'] = $sortedArticles;
        $data['categories'] = [
            'all',
            'Web Development',
            'React',
            'Next'
        ];
        return view('layouts/main', ['data' => $data]);
    }

    public function category($param): string
    {
        $category = unslugify($param);
        $data['title'] = 'Articles | MaBlog';
        $data['content'] = 'pages/articles/articles';
        $data['description'] = 'All articles of MaBlog categorized by ' . unslugify($category);
        $data['keywords'] = 'blog, articles, posts, news';

        // Filter articles by category if category is not 'all'
        if ($category === 'All') {
            $articles = $this->articles;
        } else {
            $articles = array_filter($this->articles, function ($article) use ($category) {
                return in_array($category, $article['categories']);
            });
        }

        $data['articles'] = $articles;
        $data['categories'] = [
            'all',
            'Web Development',
            'React',
            'Next'
        ];
        // return json_encode($data['articles']);
        return view('layouts/main', ['data' => $data]);
    }

    public function view($param): string
    {

        $data['title'] = 'Article | MaBlog';
        $data['content'] = 'pages/articles/article';
        $data['description'] = 'Article of MaBlog';
        $data['keywords'] = 'blog, articles, posts, news';

        // Find the article by slug and insert into data
        $article = array_filter($this->articles, function ($article) use ($param) {
            return $article['slug'] === $param;
        });
        $article = array_values($article)[0] ?? null;
        $toc_generate=generate_toc($article['body']);
        
        $data['article'] = $article;
        $data['toc'] = $toc_generate['toc'];
        $data['article']['body'] = $toc_generate['html'];

        // return json_encode($data['toc']);
        return view('layouts/main', ['data' => $data]);
    }
}
