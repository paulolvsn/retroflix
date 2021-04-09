<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
if(isset($_GET['email'])&&isset($_GET['str'])){
    if($_GET['subject'] == 'password'){
        $text = file_get_contents('passwordRecoveryEmail.php');
    }else{
        $text = file_get_contents('confirmationEmail.php');
    }
    $link = $_GET['str'];
    $adress = $_GET['email'];
    $mail = new PHPMailer;
    $mail->isHTML(true);
    $mail->isSMTP(); 
    $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
    $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
    $mail->Port = 587; // TLS only
    $mail->SMTPSecure = 'tls'; // ssl is deprecated
    $mail->SMTPAuth = true;
    $mail->Username = 'info.retroflix@gmail.com'; // email
    $mail->Password = 'retroFlix30900'; // password
    $mail->setFrom('info.retroflix@gmail.com', 'retro-flix'); // From email and name
    $mail->addAddress($adress, 'retro team'); // to email and name
    $mail->Subject = 'RETROFLIX';
    $body = $text;
    $body = str_replace('$adress', $adress, $body);
	$body = str_replace('$link', $link, $body);

    $mail->Body = $body;
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
    $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
    // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
     if(!$mail->send()){
         echo "Mailer Error: " . $mail->ErrorInfo;
     }else{
         // echo "Message sent!";
     }
    $_SESSION['adress'] = $adress;
    header("location: email-sent.php?email=$adress");
    // echo '<script> window.location.href = "http://retro-flix.000webhostapp.com/users/email-sent.php"; </script>';
    //echo '<script> window.location.href = "/users/email-sent.php"; </script>';
}