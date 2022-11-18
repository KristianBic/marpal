<?php 
    require_once("../include/functions.php");
    require_once("../classes/Database.php");
    
    session_start();
    
    $db = new Database();

    $newPass = validation($_POST['newPass']);
    $oldPass = validation($_POST['oldPass']);
    
    if($db->query("SELECT id FROM admins WHERE password = '$oldPass'")){
        $db->query("UPDATE admins SET password = '$newPass'");
    } else {
        echo "##Err: WrongOldPassword##";
    }
?>
    