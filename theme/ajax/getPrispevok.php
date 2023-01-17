<?php

require_once("../include/functions.php");
require_once("../classes/Database.php");
require_once("../../config.php");

session_start();

$db = new Database();


$id = validation($_POST['id']);

$typ = $db->query("SELECT typ FROM prispevky WHERE id = '" . $id . "'");
$ciel_pridania = $db->query("SELECT ciel_pridania FROM prispevky WHERE id = '" . $id . "'");
$nadpis = $db->query("SELECT nadpis FROM prispevky WHERE id = '" . $id . "'");
$koncovka_nahladu = $db->query("SELECT koncovka_nahladu FROM prispevky WHERE id = '" . $id . "'");
$popis = $db->query("SELECT popis FROM prispevky WHERE id = '" . $id . "'");

$result = array("id" => $id, "typ" => $typ, "ciel_pridania" => $ciel_pridania, "nadpis" => $nadpis, "koncovka_nahladu" => $koncovka_nahladu, "popis" => $popis,  "Status" => "Success");

echo json_encode($result);
