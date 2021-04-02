<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
if(isset($_GET['email'])&&isset($_GET['str'])){
    $link = $_GET['str'];
    $adress = $_GET['email'];
    $mail = new PHPMailer;
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
    $mail->msgHTML("Welcom to retroflix, <br>
                    To confirm your inscription follow the link bellow <br>
                    http://retro-flix.000webhostapp.com/users/confirm-account.php?email=$adress&str=$link"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
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
        echo "Message sent!";
    }
    echo '<script> window.location.href = "http://retro-flix.000webhostapp.com/users/email-sent.php"; </script>';
}