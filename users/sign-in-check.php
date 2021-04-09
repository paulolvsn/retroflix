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
        echo 'Mauvais identifiant ou mot de passe !';
    } else {
        if($isPasswordCorrect && $isValid) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['admin'] = $resultat['admin'];
            header("Location: /index.php");  
        }
        else if($isPasswordCorrect && ($isValid != 1)) {
            echo '<p>Your account is not activated yet. Please check you inbox mail and follow the link</p>';
        } else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }
?>