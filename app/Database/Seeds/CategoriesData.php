<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesData extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Technology'],
            ['name' => 'Health'],
            ['name' => 'Lifestyle'],
            ['name' => 'Education'],
            ['name' => 'Business'],
        ];

        // Insert categories into the 'categories' table
        $this->db->table('categories')->insertBatch( $categories);
    }
}
