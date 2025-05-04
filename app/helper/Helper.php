<?php

namespace App\Helper;

class Helper
{

    public static function validateLoginForm($POST, callable $callback)
    {
    
        if (empty($POST['username']) && empty($POST['password'])) {
            
            $callback('All required fields are empty.');

            return false;
        }

        if (empty($POST['username'])) {
            
            $callback('Username is required.');

            return false;
        }

        if (empty($POST['password'])) {
           
            $callback('Password is required.');

            return false;
        }

        return true;
    }

    public static function validateRegForm($POST, callable $callback)
    {
    
        if (empty($POST['username']) && empty($POST['password']) && empty($POST['firstname']) && empty($POST['lastname'])) {
            
            $callback('All required fields are empty.');

            return false;
        }

        if (empty($POST['username'])) {
            
            $callback('Username is required.');

            return false;
        }

        if (empty($POST['password'])) {
           
            $callback('Password is required.');

            return false;
        }

        if (empty($POST['firstname'])) {
           
            $callback('First name is required.');

            return false;
        }

        if (empty($POST['lastname'])) {
           
            $callback('Last name is required.');

            return false;
        }

        return true;
    }

    public static function storeUserToSession($USER) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return $_SESSION['userData'] = $USER;
    }

    public static function logOut () {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_abort();
        session_unset();
        session_destroy();
    }
}