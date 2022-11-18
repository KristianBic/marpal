<?php  
require_once("../libraries/facebookSDK/vendor/autoload.php");
require_once("../../config.php");

    $fb = new Facebook\Facebook([
        'app_id' => '436107984733942',
        'app_secret' => '4d0e47c5b5b3e91c592d55602a2c4c29',
        'default_graph_version' => 'v12.0',
        ]);

    $accessToken = "EAAGMo02DhvYBADOteY21HrpdbTZAsMmxWHvXLZBfUjiZA8uKbMZAA896BbrXXyapuMmOlqFISFlnfGzAHlB5BUHZBetsuRtLl0pMAlLFIjdx1AiHl7Uno76vEQczIIbkE5g7cBKLMRIKBJeOCDwZAWt094ClLsHTJKEAR81XTWLBRYc5F1ExAr";

/* $msg = [
    'message' => "Nazdar JANO",
]; */
/* $img = [
    'source' => $fb->fileToUpload(BASE_URL."assets/image/images/hydraulicka-ruka-1.png"),
    'message' => "Hi JANO",
]; */
/* $video = [
    'source' => $fb->videoToUpload(BASE_URL."assets/image/videos/hero-hydraulicka-ruka.mp4"),
    'description' => "Hi JANO",
]; */
/* $morePhotos1 = [
    'source' => $fb->fileToUpload(BASE_URL."assets/image/images/hydraulicka-ruka-1.png"),
    'description' => "Hi JANO1",
    'message' => "Hi JANO1",
    'published' => 'false',
];
$morePhotos2 = [
    'source' => $fb->fileToUpload(BASE_URL."assets/image/images/hydraulicka-ruka-1.png"),
    'description' => "Hi JANO2",
    'message' => "Hi JANO2",
    'published' => 'false',
];
$morePhotos3 = [
    'source' => $fb->fileToUpload(BASE_URL."assets/image/images/hydraulicka-ruka-1.png"),
    'description' => "Hi JANO3",
    'message' => "Hi JANO3",
    'published' => 'false',
]; */
/* 
try {
    $response = $fb->post("/me/feed", $msg, $accessToken);
     */
    /* $response = $fb->post("/me/photos", $img, $accessToken); */

    /* $response = $fb->post("/me/videos", $video, $accessToken); */

    /* $img1 = $fb->post("/me/photos", $morePhotos1, $accessToken)->getGraphNode()->asArray();
    $img2 = $fb->post("/me/photos", $morePhotos2, $accessToken)->getGraphNode()->asArray();
    $img3 = $fb->post("/me/photos", $morePhotos3, $accessToken)->getGraphNode()->asArray();

    $img1 = $img1['id'];
    $img2 = $img2['id'];
    $img3 = $img3['id'];

    $response = $fb->post('/me/feed', [
        'attached_media[0]' => '{"media_fbid":"'.$img1.'"}',
        'attached_media[1]' => '{"media_fbid":"'.$img2.'"}',
        'attached_media[2]' => '{"media_fbid":"'.$img3.'"}',
        'message' => "skapp",
    ], $accessToken); */
/* 
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo "Graph error: ".$e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "Facebook SDK error: ".$e->getMessage();
    exit;
}

$graphNode = $response->getGraphNode();
echo "ID: ".$graphNode['id'];
 */


 //INSTAGRAM
 ?>