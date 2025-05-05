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

        if (empty($POST['firstname'])) {
           
            $callback('First name is required.');

            return false;
        }

        if (empty($POST['lastname'])) {
           
            $callback('Last name is required.');

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

        if (!empty($POST['username'] && (strlen($POST['username']) < 6))) {

            $callback('Username must atleast 6 characters.');

            return false;
        }

        if (!empty($POST['password'] && (strlen($POST['password']) < 6))) {

            $callback('Password must atleast 6 characters.');

            return false;
        }

        if (!empty($POST['firstname'] && (strlen($POST['firstname']) < 3))) {

            $callback('First name is invalid.');

            return false;


        }

        if (!empty($POST['lastname'] && (strlen($POST['lastname']) < 3))) {

            $callback('First name is invalid.');

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