<?php 
    require_once("../include/functions.php");
    require_once("../classes/Database.php");
    
    session_start();
    
    $db = new Database();

    $arrOfKeys = ['sidlo', 'korAdresa', 'iban', 'konatel', 'ico', 'icdph'];

    $sidlo = validation($_POST['sidlo']);
    $korAdresa = validation($_POST['korAdresa']);
    $iban = validation($_POST['iban']);
    $konatel = validation($_POST['konatel']);
    $ico = validation($_POST['ico']);
    $icdph = validation($_POST['icdph']);

    foreach ($arrOfKeys as $key) {
        $value = ${$key};
        if(!empty($value)){
            $db->query("UPDATE kontaktne_info SET hodnota = '$value' WHERE typ = '$key'");
        }
    }
?>
    