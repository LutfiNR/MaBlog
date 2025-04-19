<?php
namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index(): string
    {
        return view('pages/login');
    }

    public function login() 
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->authenticate($username, $password);
        // Check if user exists and password is correct       
        if ($user) {
            $session = session();
            $session->set('isLoggedIn', true);
            $session->set('username', $username);
            return redirect()->to('/admin/dashboard'); // Redirect to dashboard or home page
        }   else {
            // Invalid login
            return redirect()->to('/login')->with('error', 'Invalid Username or Password');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}