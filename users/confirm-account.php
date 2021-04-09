<!DOCTYPE html>
<html lang="en">
<?php
    include "../base/head.php";
?>
    <body class="bg-dark text-white">
        <?php
            include "../base/header.php";
        ?>
        <?php
            if(isset($_GET['email']) && isset($_GET['str'])) {
                include('connect-to-bdd.php');
                $email = $_GET['email'];
                $req = $bdd->query("SELECT recovery, pseudo FROM users WHERE email = '$email'");
                while ($data = $req->fetch()) {
                    $recoveryTest = $data['recovery'];
                    $pseudo = $data['pseudo'];
                }
                if($recoveryTest == $_GET['str']) {
                    $req = $bdd->prepare('UPDATE users SET valid = 1 WHERE email = :email');
                    $req->execute(array("email" => $email));
                    $req = $bdd->prepare('UPDATE users SET recovery = "" WHERE email = :email');
                    $req->execute(array("email" => $email));
                    echo "
                        <div class='container'>
                            <div class='row mt-5 mx-5 justify-content-center'>
                                <div class='col-6 border border-white rounded p-3 my-5 '>
                                    <h4 class='text-center'>Merci d'avoir crée un compte RETROFLIX<br>$pseudo!<br>Vous pouvez maintenant vous connecter</h4>
                                    <div class='col text-center'>
                                        <a href='sign-in.php' class='btn btn-success' type='button'>Connexion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";            
                }
            }
        ?>
        <?php
                include "../base/footer.php";
        ?>  
        <?php
            include "../base/script.php";
        ?>
    </body>
</html>