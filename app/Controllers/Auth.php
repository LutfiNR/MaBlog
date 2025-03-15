<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Login | MaBlog';
        $data['content'] = 'pages/login';
        $data['description'] = 'Login to MaBlog to access your account';
        $data['keywords'] = 'login, authentication, account, user';

        return view('layouts/main', $data);
    }
    public function login()
    {
        $session = session();
        $userModel = new \App\Models\UserModel();

        // Get and validate input
        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        // Validate user credentials using the UserModel
        $user = $userModel->validateUser($username, $password);

        if ($user) {
            // Regenerate session ID to prevent session fixation attacks
            $session->regenerate();

            // Set session data
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'name' => $user['name'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('/'); // Redirect to homepage after login
        } else {
            $session->setFlashdata('error', 'Invalid username or password');
            return redirect()->to('/login'); // Redirect back to login
        }
    }
    public function logout()
    {
        session()->destroy(); // Destroy session
        return redirect()->to('/login'); // Redirect to login
    }
}
