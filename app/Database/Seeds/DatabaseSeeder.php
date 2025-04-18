<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserData');
        $this->call('ArticlesData');
        $this->call('CategoriesData');
        $this->call('ArticlesCategoriesData'); 
    }
}
