<?php

namespace App\Session;

class User
{
    private static function init()
    {
        return session_status() !== PHP_SESSION_ACTIVE ? session_start() : true;
    }
/**
 * 
 *@param String $name
 *@param String $email
 */
    
    public function  login($name, $email)
    {
        self::init();
        $_SESSION['user']=['name' => $name,
        'email'=> $email
    ];
    }

    public Static function isLogged()
    {
        self::init();
        return isset($_SESSION['üser']);  
    }
}
