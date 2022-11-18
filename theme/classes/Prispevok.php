<?php

class Prispevok
{
    protected $db;

    protected $id;
    protected $typ;
    protected $datumPridania;
    protected $cielPridania;
    protected $nadpis;
    protected $popis;
    protected $obrazky;
    protected $nahlad;

    protected $isValid;

    function __construct($db, $id) {
        $this->id = $id;
        $this->db = $db;
        if ($item = $this->db->query("SELECT * FROM prispevky WHERE id = $id")) {
            $item = $item[0];
            $this->isValid = true;
            $this->typ = $item[1];
            $this->datumPridania = new Datetime($item[2]);
            $this->cielPridania = $item[3];
            $this->nadpis = $item[4];
            $this->popis = base64_decode($item[5]);
            $this->nahlad = "nahlad.".$item[6];
            $this->obrazky = array();
            if($this->typ == "medium") array_push($this->obrazky, $this->nahlad);
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

    public function getTyp()
    {
        return $this->typ;
    }

    public function getDatumPridania($format = "d.m.Y")
    {
        return $this->datumPridania->format($format);
    }

    public function getCielPridania()
    {
        return $this->cielPridania;
    }

    public function getNadpis()
    {
        return $this->nadpis;
    }

    public function getPopis()
    {
        return $this->popis;
    }

    public function getObrazky()
    {
        if($this->typ != "text"){
            if(sizeof($this->obrazky) == 0){
                if($imgs = $this->db->query("SELECT cesta FROM obrazky_prispevkov WHERE id_prispevok = ".$this->id)){
                    foreach ($imgs as $img) {
                        array_push($this->obrazky, $img[0]);
                    }
                }
            }
        }
        return $this->obrazky;
    }

    public function getFarba()
    {
        if($farba = $this->db->select("SELECT farba FROM typy_prispevkov WHERE typ = '".$this->typ."'")){
            return $farba[0][0];
        }
    }

    public function getNahlad()
    {
        return $this->nahlad;
    }
}

?>