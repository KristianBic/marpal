<?php 
    require_once("../include/functions.php");
    require_once("../classes/Database.php");
    require_once("../../config.php");

    $db = new Database();

    if($token = $db->select("SELECT token FROM access_tokens WHERE is_active = 1 LIMIT 1")){
        $token = $token[0][0];

        $url = 'https://graph.facebook.com/v12.0/oauth/access_token?grant_type=fb_exchange_token&client_id=436107984733942&client_secret=4d0e47c5b5b3e91c592d55602a2c4c29&fb_exchange_token='.$token;
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "I-am-browser");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $response = curl_exec($ch);
        curl_close($ch);
    
        $response = json_decode($response, true);
        if(!array_key_exists("error", $response) && array_key_exists("access_token", $response)){
            $newToken = $response['access_token'];
            $db->select("UPDATE access_tokens SET is_active = 0");
            $db->select("INSERT INTO access_tokens (token, is_active, date_created) VALUES ('$newToken', 1, '".date("Y-m-d")."')");
        }
    }
?>