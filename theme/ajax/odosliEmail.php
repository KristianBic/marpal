<?php
    require_once("../include/functions.php");
    require_once("../classes/Database.php");
    require_once("../../config.php");
    require_once('../libraries/phpmailer/vendor/autoload.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    session_start();
    
    $db = new Database();
    $error = 0;

    if(!isset($_POST["meno"])) $error++;
    else $meno = validation($_POST['meno']);

    if(!isset($_POST["priezvisko"])) $error++;
    else $priezvisko = validation($_POST['priezvisko']);

    if(!isset($_POST["telefon"])) $error++;
    else $telefon = validation($_POST['telefon']);

    if(!isset($_POST["email"])) $error++;
    else $email = validation($_POST['email']);

    if(!isset($_POST["predmet"])) $error++;
    else $predmet = validation($_POST['predmet']);

    if(!isset($_POST["sprava"])) $error++;
    else $sprava = validation($_POST['sprava']);

    if($error == 0){
        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        $mail->Host = 'smtp.websupport.sk';
        $mail->From = "info@marpal.eu";
        $mail->SMTPAuth = true; 
        $mail->Username = "info@marpal.eu";   
        $mail->Password = "Marecek9";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom("info@marpal.eu", 'Marpal.eu');
        $mail->addAddress("marpal.sro@gmail.com");
        $mail->addReplyTo($email, $meno." ".$priezvisko);
        $mail->isHTML(true);
        $mail->Subject = 'Nová správa z webového formulára';
        $mail->Body = '<div style="width: 100%; height:100%; text-align: center; ">'
        .'<br><br>'
        .'<div style="font-weight: bold; color: #000; font-size: 18px;">Odoslaný formulár z webu marpal.eu'
        .'</div><br>'
        .'<div style="font-weight: bold; color: #333; font-size: 20px;">Meno:'
        .'<br><div style="font-weight: 400;color: #555; font-size: 18px;">'.$meno." ".$priezvisko
        .'<br>'
        .'</div>Email:'
        .'<br><div style="font-weight: 400; color: #555; font-size: 18px;">'.$email
        .'<br>'
        .'</div>Telefón:'
        .'<br><div style="font-weight: 400; color: #555; font-size: 18px;">'.$telefon
        .'<br>'
        .'</div>Predmet:'
        .'<br><div style="font-weight: 400; color: #555; font-size: 18px;">'.$predmet.'<br>'
        .'</div><br><br>Správa:'
        .'<br><div style="font-weight: 400; color: #555; font-size: 16px;">'.$sprava.'</div></div></div>';
        if(!$mail->send()){
            echo "Mail Error ->".$mail->ErrorInfo;
        }
    } else {
        echo "error";
    }
?>