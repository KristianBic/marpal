<?php 
    require_once("../include/functions.php");
    require_once("../classes/Database.php");
    
    session_start();
    
    $db = new Database();

    $id = validation($_POST['id']);
    
    if($item = $db->query("SELECT typ, nadpis, datum_pridania FROM prispevky WHERE id = '$id'")){
        $typ = $item[0][0];
        $db->query("DELETE FROM prispevky WHERE id = $id");
        if($typ != "text"){
            $nadpis = $item[0][1];
            $datum = $item[0][2];
            $folder = "../../assets/image/images/galerie/".$nadpis."_".date("dmY_His", strtotime($datum));
            if(file_exists($folder)) rrmdir($folder);
        }
    } else {
        echo "##Err: WrongID##";
    }
?>
    