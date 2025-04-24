<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriesTable extends Migration
{
    // The 'up' method defines the structure of the 'categories' table when the migration is run
    public function up()
    {
        // Creating the 'categories' table with fields defined below
        $this->forge->addField(array(
            // The 'id' field will be an integer, auto-incrementing primary key
            'id' => array(
                'type' => 'INT',                 // Field type is integer
                'constraint' => 11,              // Maximum length of the integer (up to 11 digits)
                'unsigned' => TRUE,              // Ensures the value is positive (no negative values)
                'auto_increment' => TRUE,        // Automatically increments with each new category
            ),
            
            // The 'name' field stores the name of the category
            'name' => array(
                'type' => 'VARCHAR',             // Field type is a variable-length string
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => FALSE,                 // Cannot be null (category must have a name)
            ),

            // The 'slug' field stores a URL-friendly version of the category name
            'slug' => array(
                'type' => 'VARCHAR',             // Field type is string (VARCHAR)
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => FALSE,                 // Cannot be null (category must have a slug)
            ),
        ));

        // Adding 'id' field as the primary key of the 'categories' table
        $this->forge->addKey('id', TRUE); // TRUE means 'id' will be the primary key

        // Creating the 'categories' table in the database
        $this->forge->createTable('categories');
    }

    // The 'down' method defines what happens when the migration is rolled back
    public function down()
    {
        // Drops the 'categories' table if the migration is rolled back
        $this->forge->dropTable('categories');
    }
}

