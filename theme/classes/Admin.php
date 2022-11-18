<?php

class Admin
{
    protected $db;

    protected $id;
    protected $login;
    protected $password;
    protected $lastLogin;
    protected $userType;
    protected $isValid;

    function __construct($db, $id) {
        $this->id = $id;
        $this->db = $db;
        if ($item = $this->db->query("SELECT * FROM admins WHERE id = $id")) {
            $item = $item[0];
            $this->isValid = true;
            $this->login = $item[1];
            $this->password = $item[2];
            $this->lastLogin = $item[3];
        } else $this->isValid = false;
    }

    function getId()
    {
        return $this->id;
    }

    function isValid()
    {
        return $this->isValid;
    }

    public function getLastLogin($format = "d.m.Y H:i:s")
    {
        return date($format, strtotime($this->lastLogin));
    }

    function checkPassword($pass) {
        return $pass == $this->password ? true : false; 	
    }
}

?>