<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration
{
    // The 'up' method defines the table structure when the migration is run.
    public function up()
    {
        // Adding fields to the 'users' table
        $this->forge->addField(array(
            // The 'id' field is an integer, it will be the primary key for this table
            'id' => array(
                'type' => 'INT',                 // Field type is integer
                'constraint' => 11,              // The size of the integer (up to 11 digits)
                'unsigned' => TRUE,              // Ensure the value is positive
                'auto_increment' => TRUE,        // Automatically increments with each new record
            ),
            
            // The 'name' field stores the user's full name
            'name' => array(
                'type' => 'VARCHAR',             // Field type is a variable-length string
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => FALSE,                 // Cannot be null
            ),

            // The 'username' field stores the unique username
            'username' => array(
                'type' => 'VARCHAR',             // Field type is a string
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => FALSE,                 // Cannot be null
                'unique' => TRUE,                // Ensure that the username is unique across the table
            ),

            // The 'password' field stores the user's password
            'password' => array(
                'type' => 'VARCHAR',             // Field type is a string
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => FALSE,                 // Cannot be null
            ),

            // The 'email' field stores the user's email address
            'email' => array(
                'type' => 'VARCHAR',             // Field type is a string
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => FALSE,                 // Cannot be null
                'unique' => TRUE,                // Ensure that the email is unique across the table
            ),

            // The 'role' field stores the user's role (e.g., admin, user, etc.)
            'role' => array(
                'type' => 'VARCHAR',             // Field type is a string
                'constraint' => 255,             // Maximum length of 255 characters
                'null' => FALSE,                 // Cannot be null
            ),
        ));
        
        // Adding a primary key on the 'id' field
        $this->forge->addKey('id', TRUE); // TRUE means the 'id' will be the primary key

        // Creating the 'users' table in the database with the defined structure
        $this->forge->createTable('users');
    }

    // The 'down' method defines what happens if the migration is rolled back
    public function down()
    {
        // Drop the 'users' table if the migration is rolled back
        $this->forge->dropTable('users');
    }
}
