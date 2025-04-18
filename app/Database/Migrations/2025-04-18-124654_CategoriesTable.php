<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriesTable extends Migration
{
    public function up()
    {
        // Create 'categories' table
        $this->forge->addField(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ),
        ));
        $this->forge->addKey('id', TRUE); // Primary Key
        $this->forge->createTable('categories');
    }

    public function down()
    {
        // Drop 'categories' table
        $this->forge->dropTable('categories');
    }
}
