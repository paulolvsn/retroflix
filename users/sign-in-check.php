<?php
    include_once('connect-to-bdd.php');
    $pseudo = $_POST['pseudo'];
    //  Récupération de l'utilisateur et de son pass hashé
    $req = $bdd->prepare('SELECT id, admin, password, valid FROM users WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo));
    $resultat = $req->fetch();
    //check password
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
    $isValid = $resultat['valid'];

    if(!$resultat) { //if entered pseudo doesn't exist in db
        $_POST['error'] = 'Mauvais identifiant ou mot de passe !';
        header("location: sign-in.php?error=0");
    } else {
        if($isPasswordCorrect && $isValid) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['admin'] = $resultat['admin'];
            header("Location: /index.php");  
        }
        else if($isPasswordCorrect && ($isValid != 1)) {
            $_POST['error'] = '<p>Your account is not activated yet. <br> Please check you inbox mail and follow the link</p>';
            header("location: sign-in.php?error=1");
        } else {
            $_POST['error'] = 'Mauvais identifiant ou mot de passe !';
            header("location: sign-in.php?error=0");
        }
    }
?>