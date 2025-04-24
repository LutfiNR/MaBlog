<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArticleCategoriesTable extends Migration
{
    // The 'up' method defines the structure of the 'article_categories' table when the migration is run
    public function up()
    {
        // Create the 'article_categories' join table
        $this->forge->addField(array(
            // The 'article_id' field will reference an article in the 'articles' table
            'article_id' => array(
                'type' => 'INT',                // Field type is integer
                'constraint' => 11,             // Maximum length of the integer (up to 11 digits)
                'unsigned' => TRUE,             // Ensures the value is positive (no negative values)
                'null' => FALSE,                // Cannot be null
            ),

            // The 'category_id' field will reference a category in the 'categories' table
            'category_id' => array(
                'type' => 'INT',                // Field type is integer
                'constraint' => 11,             // Maximum length of the integer (up to 11 digits)
                'unsigned' => TRUE,             // Ensures the value is positive (no negative values)
                'null' => FALSE,                // Cannot be null
            ),
        ));

        // Add a composite primary key on the 'article_id' and 'category_id' fields
        // This ensures that each combination of article and category is unique
        $this->forge->addKey(array('article_id', 'category_id'), TRUE); // TRUE indicates composite primary key
        
        // Add foreign key constraints
        // This ensures that each 'article_id' and 'category_id' corresponds to a valid row in the 'articles' and 'categories' tables respectively.
        $this->forge->addForeignKey('article_id', 'articles', 'id', 'CASCADE', 'CASCADE'); // Foreign Key to the 'articles' table (CASCADE on delete and update)
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE'); // Foreign Key to the 'categories' table (CASCADE on delete and update)
        
        // Create the 'article_categories' table
        $this->forge->createTable('article_categories');
    }

    // The 'down' method defines what happens when the migration is rolled back
    public function down()
    {
        // Drop the 'article_categories' table if the migration is rolled back
        $this->forge->dropTable('article_categories');
    }
}
