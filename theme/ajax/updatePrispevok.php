<?php
require_once("../include/functions.php");
require_once("../classes/Database.php");
require_once("../../config.php");

session_start();

$db = new Database();

$id = validation($_POST['id']);
$nadpis = validation($_POST['nadpis']);
$popis = validation($_POST['popis']);

$ciele = array();
for ($i = 0; $i < sizeof($_POST['ciel']); $i++) {
    array_push($ciele, validation($_POST['ciel'][$i]));
}
$typ = validation($_POST['typ']);
if (isset($_POST['popis']) && !empty($_POST['popis'])) {
    $popis =  base64_encode($_POST['popis']);
} else $popis = "";


if ($item = $db->query("UPDATE prispevky SET typ = '$typ', popis = '$popis', nadpis = '$nadpis' WHERE id = '$id'")) {
} else {
    echo "##Err: WrongID##";
}
