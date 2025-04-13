<?php

namespace App\Controllers;

class Articles extends BaseController
{
    public function index(): string
    {

        $data['title'] = 'Articles | MaBlog';
        $data['content'] = 'pages/articles';
        $data['description'] = 'All articles of MaBlog';
        $data['keywords'] = 'blog, articles, posts, news';

        // return json_encode($data['lastArticle']);
        return view('layouts/main', ['data' => $data]);
    }
}
