<?php

class User
{

    private $email;
    private $name;

    public function __construct($name = '', $email = '')
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function login()
    {
        echo "\n $this->name  has Logged in";
    }

    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setName($name)
    {
        if (is_string($name) && strlen($name) > 1 && !intval($name)) :
            $this->name = $name;
            return "\n name has been updated to $name";

        else : return "\n name is invalid";
        endif;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}


$userG = new User('Gure', 'Gure@gmail.com');
$newUser = new User();
echo $newUser->setName('Abbas');
// $userG->getName();
// echo $userG->login();
