<?php

namespace App\Helper;

class Helper
{
    // public static function validateLoginForm($POST)
    // {
    //     if (empty($_POST['username']) && empty($_POST['password'])) {
    //         $validUsername = false;
    //         $validPass = false;
    //         require '../../login.php';

    //         return false;
    //     }

    //     if (empty($_POST['username'])) {
    //         $validUsername = false;
    //         require '../../login.php';

    //         return false;
    //     }

    //     if (empty($_POST['password'])) {
    //         $validPass = false;
    //         require '../../login.php';

    //         return false;
    //     }

    //     return true;
    // }

    public static function validateLoginForm($POST, callable $callback)
    {
    
        if (empty($_POST['username']) && empty($_POST['password'])) {
            
            $callback('All required fields are empty.');

            return false;
        }

        if (empty($_POST['username'])) {
            
            $callback('username is required');

            return false;
        }

        if (empty($_POST['password'])) {
           
            $callback('password is required');

            return false;
        }

        return true;
    }
}