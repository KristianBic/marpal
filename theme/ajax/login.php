<?php
require_once("../include/functions.php");
require_once("../classes/Database.php");

session_start();

$db = new Database();

$login = validation($_POST['login']);
$password = validation($_POST['password']);
$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

$pass = $db->query("SELECT password FROM admins WHERE login = '" . $login . "'");
$id = $db->query("SELECT id FROM admins WHERE login = '" . $login . "'");

if (password_verify($password, $pass[0][0]) && $id) {
    $_SESSION['loggedIn'] = new Admin($db, $id[0][0]);
} else {
    echo "##err: wrongLogin##";
}
