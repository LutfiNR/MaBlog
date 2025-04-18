<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserData extends Seeder
{
    public function run()
    {
        $user_data = array(
            'name' => 'Lutfi Nur Rohman',
            'username' => 'upik',
            'password' => password_hash('upik123', PASSWORD_BCRYPT), // Example password, hashed
            'email' => 'lutfinurrohman5@gmail.com',
            'role' => 'admin',
        );

        // Insert the user into the database
        $this->db->table('users')->insert($user_data);
    }
}
