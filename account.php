<?php

include('check-session.php');
include_once('connect-to-bdd.php');

$pseudo = $_SESSION['pseudo'];

echo "Welcome " . $pseudo;

$reponse = $bdd->query("SELECT avatar, email, pseudo FROM users WHERE pseudo='$pseudo'");

while ($data = $reponse->fetch()){
    $avatar = $data['avatar'];
    echo  '<img id="avatarDisplay" src="'.$avatar.'" width="250" alt="avatar"><br>';
    echo $data['email'] . "<br>" ;
    echo $data['pseudo'] . "<br>" ;

}

?>

