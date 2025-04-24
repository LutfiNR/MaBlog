<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    // This method is used to show the login form
    public function index(): string
    {
        // Returns the login view, where users can input their credentials
        return view('pages/login');
    }

    // This method processes the login form
    public function login() 
    {
        // Retrieve username and password from the POST request
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Instantiate the UserModel to interact with the user data in the database
        $userModel = new UserModel();
        
        // Authenticate the user using the UserModel's 'authenticate' method
        $user = $userModel->authenticate($username, $password);
        
        // Check if the user was found and the password is correct
        if ($user) {
            // Start a session and store user information if authentication is successful
            $session = session();
            $session->set('isLoggedIn', true);  // User is logged in
            $session->set('username', $username);  // Store username in session
            
            // Redirect the user to the admin dashboard
            return redirect()->to('/admin/dashboard'); 
        } else {
            // If the authentication failed, redirect back to the login page with an error message
            return redirect()->to('/login')->with('error', 'Invalid Username or Password');
        }
    }

    // This method logs the user out
    public function logout()
    {
        // Destroy the session to log the user out
        $session = session();
        $session->destroy();
        
        // Redirect the user back to the login page
        return redirect()->to('/login');
    }
}
