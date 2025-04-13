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

        // return json_encode($data['lastArticle']);
        return view('layouts/main', ['data' => $data]);
    }
}
