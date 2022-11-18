<?php
    session_id($_POST['sid']);
    session_start();
    unset($_SESSION['loggedIn']);
?>