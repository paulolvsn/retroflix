<?php

function generateRandomString($length = 100) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//create a random string 
$rndString =  generateRandomString();

if (isset($_POST['email'])){
    $email=strtolower($_POST['email']);
    include('connect-to-bdd.php');
    // email exist in db 
    $reponse = $bdd->query('SELECT email FROM users');
    
    while ($data = $reponse->fetch()){


    if (strtolower($data['email']) == $email){

        $req = $bdd->prepare('UPDATE users SET recovery = :rndString WHERE email = :email');

    $req->execute(array(
        'email' => $email,
        'rndString' => $rndString));


        header("location: sendMail.php?subject=password&email=$email&str=$rndString");
    }

}
}
?>