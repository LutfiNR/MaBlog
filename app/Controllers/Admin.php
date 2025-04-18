<?php
namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Admin | MaBlog';
        $data['content'] = 'pages/admin/dashboard';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';
        $sortedArticles = $this->articles;

        usort($sortedArticles, function ($a, $b) {
            return strtotime($b['published_at']) <=> strtotime($a['published_at']);
        });

        $data['articles'] = $sortedArticles;
        $data['categories'] = [
            'all',
            'Web Development',
            'React',
            'Next'
        ];
        $data['user'] = [
                'name'=>'Lutfi Nur Rohman',
                'email' => 'lutfinurrohman5@gmail.com',
                'image' => '/images/photo-upik.png',
                'role' => 'admin',
                'created_at' => '2023-10-01',
                'updated_at' => '2023-10-01',
        ];

        return view('layouts/admin/main', ['data' => $data], );
    }
    public function users(): string
    {
        $data['title'] = 'Admin Users | MaBlog';
        $data['content'] = 'pages/admin/users';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        $data['user'] = [
            'name'=>'Lutfi Nur Rohman',
            'email' => 'lutfinurrohman5@gmail.com',
            'image' => '/images/photo-upik.png',
            'role' => 'admin',
            'created_at' => '2023-10-01',
            'updated_at' => '2023-10-01',
    ];

        return view('layouts/admin/main', ['data' => $data], );
    }
    public function articles(): string
    {
        $data['user'] = [
            'name'=>'Lutfi Nur Rohman',
            'email' => 'lutfinurrohman5@gmail.com',
            'image' => '/images/photo-upik.png',
            'role' => 'admin',
            'created_at' => '2023-10-01',
            'updated_at' => '2023-10-01',
    ];
        $data['title'] = 'Admin Articles | MaBlog';
        $data['content'] = 'pages/admin/articles';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        return view('layouts/admin/main', ['data' => $data], );
    }
    public function categories(): string
    {
        $data['user'] = [
            'name'=>'Lutfi Nur Rohman',
            'email' => 'lutfinurrohman5@gmail.com',
            'image' => '/images/photo-upik.png',
            'role' => 'admin',
            'created_at' => '2023-10-01',
            'updated_at' => '2023-10-01',
    ];
        $data['title'] = 'Admin Categories | MaBlog';
        $data['content'] = 'pages/admin/categories';
        $data['description'] = 'Admin page for managing the blog.';
        $data['keywords'] = 'admin, blog, articles, posts, news';

        return view('layouts/admin/main', ['data' => $data], );
    }
}
