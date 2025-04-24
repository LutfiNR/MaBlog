<?php

namespace App\Controllers;

class Contact extends BaseController
{
    // The index method displays the contact page
    public function index(): string
    {
        // Prepare data for the view
        $data['title'] = 'Contact Me | MaBlog';  // Title of the page for SEO purposes
        $data['content'] = 'pages/contact';  // Specifies the view file to be used for the contact page
        $data['description'] = 'Contact me for any inquiries or collaborations. I am always open to new opportunities and challenges.';  // Meta description for SEO
        $data['keywords'] = 'blog, articles, posts, news';  // Meta keywords for SEO purposes

        // Render the main layout with the contact page data
        return view('layouts/main', ['data' => $data]);
    }
}
