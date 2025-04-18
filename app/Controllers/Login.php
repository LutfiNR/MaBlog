<?php
namespace App\Controllers;

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

        $usr = 'tes';
        $pwd = 'tes';
        if ($username === $usr && $password === $pwd) {
            // Set session data
            $session = session();
            $session->set('isLoggedIn', true);
            $session->set('username', $username);
            return redirect()->to('/admin/dashboard'); // Redirect to dashboard or home page
        }   else {
            // Invalid login
            // return redirect()->to('pages/login')->with('error', 'Invalid Username or Password');
        }
    }
}