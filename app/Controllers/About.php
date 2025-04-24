<?php

namespace App\Controllers;  // Defining the namespace where the controller belongs

// 'About' controller class, extending from the base controller
class About extends BaseController
{
    // The 'index' method is the default method for the 'about' page
    public function index(): string
    {
        // Prepare data to pass to the view
        $data['title'] = 'About Me | MaBlog';  // Set the page title that will be shown in the browser tab
        $data['content'] = 'pages/about';  // This points to the view file 'pages/about', which holds the main content for the about page
        $data['description'] = 'Here are some details about my self Lutfi Nur Rohman';  // Meta description for SEO
        $data['keywords'] = 'blog, articles, posts, news';  // Meta keywords for SEO optimization

        // Return the view to be rendered with the 'layouts/main' layout file, passing 'data' as the view data
        return view('layouts/main', ['data' => $data]);
    }
}
