<?php

class KontaktInfo
{
    private $db;

    private $id;
    private $typ;
    private $hodnota;

    private $isValid;

    function __construct($db, $id = -1, $typ = null) {
        $this->db = $db;
        if($typ != null){
            if ($item = $this->db->query("SELECT * FROM kontaktne_info WHERE typ = '$typ'")) {
                $item = $item[0];
                $this->isValid = true;
                $this->id = $item[0];
                $this->typ = $item[1];
                $this->hodnota = $item[2];
            } else $this->isValid = false;
        } else {
            if ($item = $this->db->query("SELECT * FROM kontaktne_info WHERE id = $id")) {
                $item = $item[0];
                $this->isValid = true;
                $this->id = $item[0];
                $this->typ = $item[1];
                $this->hodnota = $item[2];
            } else $this->isValid = false;
        }
        
    }

    function getId()
    {
        return $this->id;
    }

    function isValid()
    {
        return $this->isValid;
    }

    public function getTyp()
    {
        return $this->typ;
    }

    public function getHodnota()
    {
        return $this->hodnota;
    }
}

?>