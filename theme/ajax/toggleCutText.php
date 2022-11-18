<?php 
    require_once("../include/functions.php");
    require_once("../classes/Database.php");
    require_once("../classes/Prispevok.php");
    
    session_start();
    
    $db = new Database();


    if(is_numeric($_POST['id'])){
        $prispevok = new Prispevok($db, $_POST['id']);
        if($prispevok->isValid()){
            if($_POST['action'] == "more"){ ?>
                <p class="post-text"><?php echo trim($prispevok->getPopis()); ?></p>
            <?php } else { ?>
                <p class="post-text"><?php echo trim(html_cut($prispevok->getPopis(), 50)); ?></p>
            <?php } } } ?>
    