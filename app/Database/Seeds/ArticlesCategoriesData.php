<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticlesCategoriesData extends Seeder
{
    public function run()
    {

        // Relationships between articles and categories
        $article_categories = [
            ['article_id' => 1, 'category_id' => 1], // AI in Tech
            ['article_id' => 1, 'category_id' => 5], // + Business

            ['article_id' => 2, 'category_id' => 1], // Renewable Energy in Tech
            ['article_id' => 2, 'category_id' => 4], // + Education

            ['article_id' => 3, 'category_id' => 2], // Healthy Lifestyle in Health
            ['article_id' => 3, 'category_id' => 3], // + Lifestyle

            ['article_id' => 4, 'category_id' => 5], // E-Commerce in Business
            ['article_id' => 4, 'category_id' => 1], // + Tech
        ];

        // Insert relationships into 'article_categories' table
        $this->db->table('article_categories')->insertBatch( $article_categories);

    }
}
