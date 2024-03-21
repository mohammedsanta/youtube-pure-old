<?php
namespace App\Controllers\Auth;

class LogoutController
{

    public function logout()
    {
        unset($_SESSION['user_profile']);
        header('Location:'.'/login');
    }

}