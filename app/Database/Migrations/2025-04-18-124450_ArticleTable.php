<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ArticleTable extends Migration
{
    public function up()
    {
        // Create 'articles' table
        $this->forge->addField(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => FALSE,
            ),
            'body' => array(
                'type' => 'TEXT',
                'null' => FALSE,
            ),
            'reading_time' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
                'null' => FALSE,
            ),
            'is_featured' => array(
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'null' => FALSE,
            ),
            'visited' => array(
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
                'null' => FALSE,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => FALSE,
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'image_src' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
            ),
            'author_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE,
                'unique' => TRUE,
            ),
        ));
        $this->forge->addKey('id', TRUE); // Primary Key
        $this->forge->addForeignKey('author_id', 'users', 'id', 'SET NULL', 'CASCADE'); // Foreign Key constraint
        
        $this->forge->createTable('articles');
        
        // Create Indexes
        $this->db->query('CREATE INDEX idx_author_id ON articles (author_id)');
        $this->db->query('CREATE INDEX idx_slug ON articles (slug)');
    }

    public function down()
    {
        // Drop 'articles' table
        $this->forge->dropTable('articles');
    }
}
