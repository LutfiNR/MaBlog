<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Insert Admin User
        $adminData = [
            'username'      => 'kirin412',
            'password_hash' => password_hash('Kirin123', PASSWORD_DEFAULT),
            'name'          => 'Lutfi Nur Rohman',
            'role'          => 'admin',
            'profile_image' => 'images/photo_upik.png',
        ];
        $db->table('users')->insert($adminData);
        $adminId = $db->insertID(); // Get inserted User ID

        // Insert Categories
        $categories = ['Technology', 'Programming', 'Web Development'];
        $categoryIds = [];

        foreach ($categories as $category) {
            $db->table('categories')->insert(['name' => $category]);
            $categoryIds[] = $db->insertID();
        }

        // Insert Keywords
        $keywords = ['CodeIgniter', 'PHP', 'Backend', 'MySQL', 'Web App'];
        $keywordIds = [];

        foreach ($keywords as $keyword) {
            $db->table('keywords')->insert(['name' => $keyword]);
            $keywordIds[] = $db->insertID();
        }

        // Insert Articles
        $articles = [
            [
                'title'       => 'Getting Started with CodeIgniter 4',
                'description' => 'Learn how to build web applications using CI4.',
                'content'     => '<p>CodeIgniter 4 is a powerful PHP framework...</p>',
                'image'       => 'images/article1.jpg',
                'author_id'   => $adminId,
            ],
            [
                'title'       => 'Understanding MVC in PHP',
                'description' => 'A deep dive into the Model-View-Controller pattern.',
                'content'     => '<p>MVC is a design pattern that...</p>',
                'image'       => 'images/article2.jpg',
                'author_id'   => $adminId,
            ],
            [
                'title'       => 'Building a Blog System with CI4',
                'description' => 'A tutorial on creating a blog with CodeIgniter 4.',
                'content'     => '<p>Let’s build a blog system using CI4...</p>',
                'image'       => 'images/article3.jpg',
                'author_id'   => $adminId,
            ],
        ];

        foreach ($articles as $articleData) {
            $db->table('articles')->insert($articleData);
            $articleId = $db->insertID();

            // Assign Categories (Random 2)
            shuffle($categoryIds);
            foreach (array_slice($categoryIds, 0, 2) as $categoryId) {
                $db->table('article_categories')->insert([
                    'article_id'  => $articleId,
                    'category_id' => $categoryId,
                ]);
            }

            // Assign Keywords (Random 3)
            shuffle($keywordIds);
            foreach (array_slice($keywordIds, 0, 3) as $keywordId) {
                $db->table('article_keywords')->insert([
                    'article_id' => $articleId,
                    'keyword_id' => $keywordId,
                ]);
            }
        }
    }
}
