<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index(): string
    {

        $data['title'] = 'Contact Me | MaBlog';
        $data['content'] = 'pages/contact';
        $data['description'] = 'Contact me for any inquiries or collaborations. I am always open to new opportunities and challenges.';
        $data['keywords'] = 'blog, articles, posts, news';

        // return json_encode($data['lastArticle']);
        return view('layouts/main', ['data' => $data]);
    }
}
