<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArticleTable extends Migration
{
    // The 'up' method defines the structure of the 'articles' table when the migration is run
    public function up()
    {
        // Creating the 'articles' table with fields defined below
        $this->forge->addField(array(
            // The 'id' field will be an integer, auto-incrementing primary key
            'id' => array(
                'type' => 'INT',                 // Field type is integer
                'constraint' => 11,              // Size of the integer (up to 11 digits)
                'unsigned' => TRUE,              // Ensures the value is positive (no negative values)
                'auto_increment' => TRUE,        // Automatically increments with each new record
            ),
            
            // The 'title' field will store the article's title
            'title' => array(
                'type' => 'VARCHAR',             // Field type is a variable-length string
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => FALSE,                 // Cannot be null (article must have a title)
            ),

            // The 'description' field stores a short description of the article
            'description' => array(
                'type' => 'TEXT',                // Field type is text (longer than VARCHAR)
                'null' => FALSE,                 // Cannot be null
            ),

            // The 'body' field will store the full content of the article
            'body' => array(
                'type' => 'TEXT',                // Field type is text (for longer content)
                'null' => FALSE,                 // Cannot be null (article must have content)
            ),

            // The 'reading_time' field stores an estimate of how long the article will take to read
            'reading_time' => array(
                'type' => 'INT',                 // Field type is integer
                'constraint' => 11,              // Maximum length for the integer
                'default' => 0,                  // Default value is 0 if not provided
                'null' => FALSE,                 // Cannot be null
            ),

            // The 'is_featured' field stores whether the article is featured (1 for true, 0 for false)
            'is_featured' => array(
                'type' => 'TINYINT',             // Small integer field (1 byte)
                'constraint' => 1,               // Can only hold values 0 or 1
                'default' => 0,                  // Default value is 0 (not featured)
                'null' => FALSE,                 // Cannot be null
            ),

            // The 'visited' field counts the number of times the article has been viewed
            'visited' => array(
                'type' => 'INT',                 // Field type is integer
                'constraint' => 11,              // Maximum length for the integer
                'default' => 0,                  // Default value is 0
                'null' => FALSE,                 // Cannot be null
            ),

            // The 'created_at' field stores the date and time when the article was created
            'created_at' => array(
                'type' => 'DATETIME',            // Field type is date and time
                'null' => FALSE,                 // Cannot be null (must have a creation date)
            ),

            // The 'updated_at' field stores the date and time when the article was last updated
            'updated_at' => array(
                'type' => 'DATETIME',            // Field type is date and time
                'null' => TRUE,                  // Can be null (not required if not updated)
            ),

            // The 'image_src' field stores the path or URL of the article's image
            'image_src' => array(
                'type' => 'VARCHAR',             // Field type is string (VARCHAR)
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => TRUE,                  // Can be null (not required)
            ),

            // The 'author_id' field links the article to the user (author) who created it
            'author_id' => array(
                'type' => 'INT',                 // Field type is integer
                'constraint' => 11,              // Maximum length for the integer
                'unsigned' => TRUE,              // Ensures the value is positive
                'null' => TRUE,                  // Can be null (if no author is associated)
            ),

            // The 'slug' field stores the URL-friendly version of the article's title
            'slug' => array(
                'type' => 'VARCHAR',             // Field type is string (VARCHAR)
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => TRUE,                  // Can be null (not required)
                'unique' => TRUE,                // Ensures that each article has a unique slug
            ),
        ));

        // Adding 'id' field as the primary key of the 'articles' table
        $this->forge->addKey('id', TRUE); // TRUE means 'id' will be the primary key

        // Adding a foreign key constraint on 'author_id' which references the 'id' column in the 'users' table
        // If the user (author) is deleted, their articles will be updated to have a NULL author_id
        $this->forge->addForeignKey('author_id', 'users', 'id', 'SET NULL', 'CASCADE'); // Foreign Key Constraint
        
        // Creating the 'articles' table in the database
        $this->forge->createTable('articles');
        
        // Creating indexes to optimize queries involving 'author_id' and 'slug'
        $this->db->query('CREATE INDEX idx_author_id ON articles (author_id)'); // Index on 'author_id'
        $this->db->query('CREATE INDEX idx_slug ON articles (slug)');           // Index on 'slug'
    }

    // The 'down' method defines what happens when the migration is rolled back
    public function down()
    {
        // Drops the 'articles' table if the migration is rolled back
        $this->forge->dropTable('articles');
    }
}
