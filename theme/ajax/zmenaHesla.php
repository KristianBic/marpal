<?php
require_once("../include/functions.php");
require_once("../classes/Database.php");

session_start();

$db = new Database();

$newPass = validation($_POST['newPass']);
$oldPass = validation($_POST['oldPass']);


$hashed_New_password = password_hash($newPass, PASSWORD_DEFAULT);
$hashed_Old_password = password_hash($oldPass, PASSWORD_DEFAULT);


$pass = $db->query("SELECT password FROM admins WHERE login = 'admin'");


if (password_verify($oldPass, $pass[0][0])) {
    $db->query("UPDATE admins SET password = '$hashed_New_password'");
} else {
    echo "##Err: WrongOldPassword##";
}
