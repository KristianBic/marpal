<?php
require_once("../include/functions.php");
require_once("../classes/Database.php");
require_once("../../config.php");

session_start();

$db = new Database();
$location = "../../assets/image/images/vozovypark/";

$title = validation($_POST['title']);
$popis = validation($_POST['popis']);
$id = validation($_POST['id']);

if (isset($_FILES['img']) && 0 >= $_FILES['img']['error']) {
    if ($title != "") {
        $file = $_FILES['img']['name'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $file = basename($file, "." . $ext);
        $friendlyName = friendly_string(lowercase($title)) . "_" . date("dmY_His") . "." . $ext;
        move_uploaded_file($_FILES['img']['tmp_name'], $location . $friendlyName);
        $hydraulika = 0;
        if ($_POST['hydraulika'] == 1) $hydraulika = 1;
        if ($item = $db->query("UPDATE vozovypark SET title = '$title', preview = '$friendlyName', is_hydraulicke = '$hydraulika', popis = '$popis' WHERE id = '$id'")) {
        } else {
            echo "##Err: WrongID##";
        }
    }
} else {
    if ($_POST['hydraulika'] == 1) $hydraulika = 1;
    if ($item = $db->query("UPDATE vozovypark SET title = '$title', is_hydraulicke = '$is_hydraulicke', popis = '$popis' WHERE id = '$id'")) {
    } else {
        echo "##Err: WrongID##";
    }
}
