<?php

namespace App\Auth;

use App\Models\User;

class Auth
{

    public static function login($userId)
    {
        $token = random_int(10000000000, 99999999999999);
        $user = new User;
        $user->updateToken($userId, $token);
        setcookie("id_token", $token);
        return $token;   
    }

    public static function user()
    {
        if (!isset($_COOKIE["id_token"])) {
            return null;
        }
        
        $user= new User;
        $result = $user->find_usertoken($_COOKIE["id_token"]);
        return $result;
    }

    public static function logout()
    {
        setcookie("id_token", "");
    }

}