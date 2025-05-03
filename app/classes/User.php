<?php

class User
{
    private $firstname;
    private $lastname;
    private $username;
    private $password;
    
    public function __construct($firstname, $lastname, $username, $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->password = $password;
    }

}
