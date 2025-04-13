<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index(): string
    {

        $data['title'] = 'About Me | MaBlog';
        $data['content'] = 'pages/about';
        $data['description'] = 'Here are some details about my self Lutfi Nur Rohman';
        $data['keywords'] = 'blog, articles, posts, news';

        // return json_encode($data['lastArticle']);
        return view('layouts/main', ['data' => $data]);
    }
}
