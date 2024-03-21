<?php
namespace App\Controllers\Auth;

use App\Models\users;

class Authentication
{

    public static function isLoged()
    {
        if(!isset($_SESSION['user_profile']) && $_SERVER['REQUEST_URI'] != "/login"){
            header('Location:'.'/login');
        }

        if(isset($_SESSION['user_profile']) && $_SERVER['REQUEST_URI'] == "/login"){
            header('Location:'.'/');
        }

    }


    public static function issetUser($username,$password)
    {

        $user = users::query("select * from users join user_profile using(id) where username='{$username}' and password='{$password}'");

        

        ($user != []) ? $_SESSION['user_profile'] = $user[0] : [];

    }

}