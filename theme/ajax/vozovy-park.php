<?php
require_once("../include/functions.php");
require_once("../classes/Database.php");

session_start();

$db = new Database();
$location = "../../assets/image/images/vozovypark/";

if (isset($_POST['updID']) && is_numeric($_POST['updID'])) {
    $id = validation($_POST['updID']);

    $nadpis = $db->query("SELECT title FROM vozovypark WHERE id = '" . $id . "'");
    $popis = $db->query("SELECT popis FROM vozovypark WHERE id = '" . $id . "'");
    $preview = $db->query("SELECT preview FROM vozovypark WHERE id = '" . $id . "'");
    $id_hydraulicke = $db->query("SELECT is_hydraulicke FROM vozovypark WHERE id = '" . $id . "'");

    $result = array("id" => $id, "popis" => $popis, "nadpis" => $nadpis, "preview" => $preview, "id_hydraulicke" => $id_hydraulicke, "Status" => "Success");

    echo json_encode($result);
}

if (isset($_POST['vozID']) && is_numeric($_POST['vozID'])) {
    $vozID = validation($_POST['vozID']);
    if ($img = $db->query("SELECT preview FROM vozovypark WHERE id = $vozID")) {
        $img = $img[0][0];
        if (file_exists($location . $img)) unlink($location . $img);
        $db->query("DELETE FROM vozovypark WHERE id = $vozID");
    }
}

if (isset($_FILES['img']) && 0 >= $_FILES['img']['error']) {
    $title = validation($_POST['title']);
    $popis = validation($_POST['popis']);
    var_dump($popis);
    if ($title != "") {
        $file = $_FILES['img']['name'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $file = basename($file, "." . $ext);
        $friendlyName = friendly_string(lowercase($title)) . "_" . date("dmY_His") . "." . $ext;
        move_uploaded_file($_FILES['img']['tmp_name'], $location . $friendlyName);
        $hydraulika = 0;
        if ($_POST['hydraulika'] == 1) $hydraulika = 1;
        $db->query("INSERT INTO `vozovypark`(`title`, `preview`, `is_hydraulicke`, `popis`) VALUES ('$title', '$friendlyName', $hydraulika, '$popis')");
    }
}
