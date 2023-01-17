<?php
require_once("../include/functions.php");
require_once("../classes/Database.php");
require_once("../../config.php");

session_start();

$db = new Database();

$location = "../../assets/image/images/galerie/";

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

$token = $db->select("SELECT token FROM access_tokens WHERE is_active = 1 LIMIT 1");
$accessToken = $token[0][0];
$imagesArr = [];
$fileToUpload;
$datum = $db->query("SELECT datum_pridania FROM prispevky WHERE id = '" . $id . "'");

if ($typ != "text") {
    if (isset($_FILES['nahlad']) && 0 >= $_FILES['nahlad']['error']) {
        $file = $_FILES['nahlad']['name'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $file = basename($file, "." . $ext);
        $friendlyName = "nahlad." . $ext;
        $date = new DateTime(str_replace('-', ':', $datum[0][0]));
        $folderName = $nadpis . "_" . $date->format("dmY_His");

        mkdir("../../assets/image/images/galerie/" . $folderName);
        move_uploaded_file($_FILES['nahlad']['tmp_name'], $location . $folderName . "/" . $friendlyName);
        $db->query("SET NAMES utf8mb4");
        $db->query("INSERT INTO prispevky (koncovka_nahladu) VALUES ('$ext') WHERE id = '$id'");
        $prispevokID = $id;
        if ($typ == "galeria") {
            if (array_search("fb", $ciele) !== false)
                $imagesArr += ['img' => ['source' => $fb->fileToUpload(BASE_URL . "assets/image/images/galerie/" . $folderName . "/" . $friendlyName), 'message' => " ", 'published' => 'false', 'description' => " ",]];
        } else {
            var_dump(array_search("fb", $ciele) !== false);
            if (array_search("fb", $ciele) !== false) {
                if ($ext == "mp4") {
                    $video = [
                        'source' => $fb->videoToUpload(BASE_URL . "assets/image/images/galerie/" . $folderName . "/" . $friendlyName),
                    ];
                    $response = $fb->post("/me/videos", $video, $accessToken);
                } else {
                    $photo = [
                        'source' => $fb->fileToUpload(BASE_URL . "assets/image/images/galerie/" . $folderName . "/" . $friendlyName),
                    ];
                    $response = $fb->post("/me/photos", $photo, $accessToken);
                }
                var_dump($response);
            }
        }
        $i = 0;
        if (isset($_FILES['galeria'])) {
            foreach ($_FILES['galeria']['name'] as $fileName) {
                if ($_FILES['galeria']['error'][$i] == 0) {
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    $file = basename($fileName, "." . $ext);
                    $friendlyName = "obr" . $i . "." . $ext;
                    move_uploaded_file($_FILES['galeria']['tmp_name'][$i], $location . $folderName . "/" . $friendlyName);
                    $db->query("INSERT INTO obrazky_prispevkov (id_prispevok, cesta) VALUES ($prispevokID, '$friendlyName')");
                    if (array_search("fb", $ciele) !== false)
                        $imagesArr += ["img" . ($i + 1) => ['source' => $fb->fileToUpload(BASE_URL . "assets/image/images/galerie/" . $folderName . "/" . $friendlyName), 'message' => " ", 'published' => 'false', 'description' => " "]];
                }
                $i++;
            }
        }
    } else {
        echo "##Err: obrazkyNeboliNajdene##";
    }
}

if ($item = $db->query("UPDATE prispevky SET typ = '$typ', popis = '$popis', nadpis = '$nadpis' WHERE id = '$id'")) {
} else {
    echo "##Err: WrongID##";
}
