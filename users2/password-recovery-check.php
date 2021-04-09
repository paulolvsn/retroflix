<?php

if (isset($_POST['pass1'])&&
    isset($_POST['pass2'])&&
    isset($_GET['email'])){
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        $email=$_GET['email'];
        if($pass1==$pass2){ //we check if pass are equals
        include('connect-to-bdd.php');
        $email = $_GET['email'];
        $newPass = password_hash($pass1, PASSWORD_DEFAULT);

                $req = $bdd->prepare('UPDATE users SET password = :newPass WHERE email = :email');
                $req->execute(array(
                "email" => $email,
                "newPass" => $newPass));
                header("Location: http://retro-flix.000webhostapp.com/users/sign-in.php");
        }else{
            header("Location: password-recovery.php?failed=1&email='$email'");
        }
}