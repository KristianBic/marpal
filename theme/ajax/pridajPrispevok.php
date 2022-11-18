<?php 
    require_once("../include/functions.php");
    require_once("../classes/Database.php");
    require_once("../../config.php");
    
    session_start();
    
    $db = new Database();

    $nadpis = validation($_POST['nadpis']);
    $ciele = array();
    for ($i=0; $i < sizeof($_POST['ciel']); $i++) { 
        array_push($ciele, validation($_POST['ciel'][$i]));
    }
    $typ = validation($_POST['typ']);
    if(isset($_POST['popis']) && !empty($_POST['popis'])){
        $popis =  base64_encode($_POST['popis']);
    } else $popis = "";
    $location = "../../assets/image/images/galerie/";
    if(array_search("fb", $ciele) !== false){
        require_once("../libraries/facebookSDK/vendor/autoload.php");
        $fb = new Facebook\Facebook([
            'app_id' => '436107984733942',
            'app_secret' => '4d0e47c5b5b3e91c592d55602a2c4c29',
            'default_graph_version' => 'v12.0',
            ]);
    }
    $token = $db->select("SELECT token FROM access_tokens WHERE is_active = 1 LIMIT 1");
    $accessToken = $token[0][0];
    $imagesArr = [];
    $fileToUpload;

    if($typ != "text"){
        if (isset($_FILES['nahlad']) && 0 >= $_FILES['nahlad']['error']) {
            $file = $_FILES['nahlad']['name'];
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $file = basename($file, "." . $ext);
            $friendlyName = "nahlad." . $ext;
            $date = new DateTime();
            $folderName = $nadpis."_".$date->format("dmY_His");
            mkdir("../../assets/image/images/galerie/".$folderName);
            move_uploaded_file($_FILES['nahlad']['tmp_name'], $location.$folderName."/".$friendlyName);
            $db->query("SET NAMES utf8mb4");
            $db->query("INSERT INTO prispevky (typ, datum_pridania, ciel_pridania, nadpis, popis, koncovka_nahladu) VALUES ('$typ','".$date->format("Y-m-d H:i:s")."', '".implode(",", $ciele)."', '$nadpis', '$popis', '$ext')");
            $prispevokID = $db->getInsertId();
            $popis = base64_decode($popis);
            if($typ == "galeria") {
                if(array_search("fb", $ciele) !== false)
                    $imagesArr += ['img' => ['source' => $fb->fileToUpload(BASE_URL."assets/image/images/galerie/".$folderName."/".$friendlyName), 'message' => " ", 'published' => 'false', 'description' => " ",]];
            } else {
                var_dump(array_search("fb", $ciele) !== false);
                if(array_search("fb", $ciele) !== false) {
                    if($ext == "mp4"){
                        $video = [
                            'source' => $fb->videoToUpload(BASE_URL."assets/image/images/galerie/".$folderName."/".$friendlyName),
                            'description' => $popis,
                            'message' => $popis,
                        ];
                        $response = $fb->post("/me/videos", $video, $accessToken);
                    } else {
                        $photo = [
                            'source' => $fb->fileToUpload(BASE_URL."assets/image/images/galerie/".$folderName."/".$friendlyName),
                            'description' => $popis,
                            'message' => $popis,
                        ];
                        $response = $fb->post("/me/photos", $photo, $accessToken);
                    }
                    var_dump($response);
                }
            }
            $i = 0;
            if(isset($_FILES['galeria'])){
                foreach ($_FILES['galeria']['name'] as $fileName) {
                    if($_FILES['galeria']['error'][$i] == 0) {
                        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                        $file = basename($fileName, "." . $ext);
                        $friendlyName = "obr" . $i . "." . $ext;
                        move_uploaded_file($_FILES['galeria']['tmp_name'][$i], $location.$folderName."/".$friendlyName);
                        $db->query("INSERT INTO obrazky_prispevkov (id_prispevok, cesta) VALUES ($prispevokID, '$friendlyName')");
                        if(array_search("fb", $ciele) !== false)
                            $imagesArr += ["img".($i + 1) => ['source' => $fb->fileToUpload(BASE_URL."assets/image/images/galerie/".$folderName."/".$friendlyName), 'message' => " ", 'published' => 'false', 'description' => " "]];
                    }
                    $i++;
                }
            }
        } else {
            echo "##Err: obrazkyNeboliNajdene##";
        }
    } else {
        $db->query("INSERT INTO prispevky (typ, datum_pridania, ciel_pridania, nadpis, popis) VALUES ('$typ','".date("Y-m-d H:i:s")."', '".implode(",", $ciele)."', '$nadpis', '$popis')");
        $prispevokID = $db->getInsertId();
    }    

    //FB 

    //https://graph.facebook.com/v2.10/oauth/access_token?grant_type=fb_exchange_token&client_id=651200252546608&client_secret=38af35065ab48cdc1793fecc7c5a313c&fb_exchange_token=EAAJQQ1ZB7DjABANW5X7J2VkkI8zY790eCvwcBf15uxNbRXFeWt54N2jYyxOK5ulYtTQDbPqQ1faDaBZCkRBmWPRKKFqNiO9IEFqktu5jL8ysYrGJJY1NTNflgyF63OBRfCcMkHm2lYob18jmutzZBp8ZCuL7WzNZBvuxEE7137yeXRxjGSBuUo0O2ilHu2kexcTjgam4zHagMdZCofqV8H

    if(array_search("fb", $ciele) !== false) {
        if($typ == "text"){
            $msg = [
                'message' => base64_decode($popis),
            ];
            try {
                $response = $fb->post("/me/feed", $msg, $accessToken);
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                echo "Graph error: ".$e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "Facebook SDK error: ".$e->getMessage();
                exit;
            }
        } else if($typ == "galeria") {       
            if (isset($_FILES['nahlad']) && isset($_FILES['galeria']['name']) && 0 >= $_FILES['nahlad']['error']) {
                $postArray = [];
                if($popis != "") $postArray += ['message' => $popis];
                $i = 0;
                foreach ($imagesArr as $key => $img) {       
                    $postID = ($fb->post("/me/photos", $img, $accessToken)->getGraphNode()->asArray())['id'];
                    $postArray += ['attached_media['.$i.']' => '{"media_fbid":"'.$postID.'"}'];
                    $i++;
                }
                $response = $fb->post('/me/feed', $postArray, $accessToken);
            }
        }
        $graphNode = $response->getGraphNode();
        if(is_numeric($graphNode['id'])){
            $db->query("UPDATE prispevky SET fb_post_id = ".$graphNode['id']." WHERE id = $prispevokID");
        }
    }
?>