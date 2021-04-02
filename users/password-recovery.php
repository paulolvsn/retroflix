<?php
session_start();
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
mail("guillaumeazer@gmail.com","Subject","Content");



// if (isset($_POST['email'])&& 
//     filter_var(test_input($_POST['email']), FILTER_VALIDATE_EMAIL)){
// $token = bin2hex(random_bytes(50));
// $email =$_POST['email'];
// $to = $email;
// $subject = "Reset your password on examplesite.com";
// $msg = "Hi there, click on this <a href=\"new_password.php?token=" . $token . "\">link</a> to reset your password on our site";
// $msg = wordwrap($msg,70);
// $headers = "From: info@examplesite.com";
// mail($to, $subject, $msg, $headers);
// echo mail($to, $subject, $msg, $headers);
// // header('location: pending.php?email=' . $email);

//     }

    ?>