<?php
include_once('connect-to-bdd.php');


$pseudo = $_POST['pseudo'];


//  Récupération de l'utilisateur et de son pass hashé
$req = $bdd->prepare('SELECT id, password FROM users WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch();

//check password
$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

if (!$resultat)//if entered pseudo doesn't exist in db
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header("Location: account.php");  
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}

?>