<?php
require_once("../include/functions.php");
require_once("../classes/Database.php");

session_start();

$db = new Database();

$login = validation($_POST['login']);
$password = validation($_POST['password']);
if($id = $db->query("SELECT id FROM admins WHERE login = '".$login."' AND password = '".$password."'")){
    $_SESSION['loggedIn'] = new Admin($db, $id[0][0]);
} else {
    echo "##err: wrongLogin##";
}
