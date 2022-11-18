<?php
    $ip = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set("Europe/Bratislava");

    if ($ip == '127.0.0.1' or $ip == '::1') {
        define('LOCALHOST', true);
    } else {
        define('LOCALHOST', false);
    }

    if (LOCALHOST) {
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'marpal_db');
        define('DB_PORT', null); 
    } else {
        define('DB_HOST', 'mariadb103.websupport.sk:3313');
        define('DB_USER', 'marpal_user');
        define('DB_PASS', 'Rp0>G6]av]');
        define('DB_NAME', 'marpal_db');
        define('DB_PORT', null);
    }

    function autoload($className)
    {
        $prep = "./theme/";
        if (strpos(getcwd(), "ajax") !== false) $prep = "../";
        require_once($prep."classes/".$className.".php");
    }
    spl_autoload_register("autoload");
    if (LOCALHOST) {
        define('BASE_URL', 'https://'.$_SERVER['HTTP_HOST']."/marpal/");
    } else {
        define('BASE_URL', 'https://marpal.eu/');
    }
?>