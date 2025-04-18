<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArticleCategoriesTable extends Migration
{
    public function up()
    {
        // Create 'article_categories' join table
        $this->forge->addField(array(
            'article_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
            'category_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ),
        ));
        $this->forge->addKey(array('article_id', 'category_id'), TRUE); // Composite Primary Key
        
        // Add foreign keys
        $this->forge->addForeignKey('article_id', 'articles', 'id', 'CASCADE', 'CASCADE'); // Foreign Key to articles
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE'); // Foreign Key to categories
        
        $this->forge->createTable('article_categories');
    }

    public function down()
    {
        // Drop 'article_categories' table
        $this->forge->dropTable('article_categories');
    }
}
