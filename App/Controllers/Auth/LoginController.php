<?php
namespace App\Controllers\Auth;

class LoginController
{

    public function viewLogin()
    {
        view('Auth.login');
    }

    public function login()
    {
        Authentication::issetUser('santa','1234567890');
        header('Location:'.'/');
    }
    
}