<!DOCTYPE html>
<html lang="en">
<?php
        include "../base/head.php";
?>

<body class="bg-dark text-white">
<!-- HEADER -->
        <?php
            include "../base/header.php";
        ?> 
<!-- TEXT -->

<?php
if(isset($_GET['email']) && isset($_GET['str'])){
    include('connect-to-bdd.php');
    $email = $_GET['email'];
    
    $req = $bdd->query("SELECT recovery, pseudo FROM users WHERE email = '$email'");

    while ($data = $req->fetch()){

    $recoveryTest = $data['recovery'];
    $pseudo = $data['pseudo'];
    
    }
    if($recoveryTest == $_GET['str']){
        $req = $bdd->prepare('UPDATE users SET valid = 1 WHERE email = :email');
        $req->execute(array(
        "email" => $email
        ));
        $req = $bdd->prepare('UPDATE users SET recovery = "" WHERE email = :email');
        $req->execute(array(
        "email" => $email
        ));
?>
    <div class="container">
        <div class="row mt-5 mx-5 justify-content-center">
            <div class="col-6 border border-white border-1 rounded shadow p-3 mb-5 mt-5 ">
                   <h4 class="text-center">Merci d'avoir crée un compte RETROFLIX <br> <?php echo $pseudo  ?> ! <br> Vous pouvez maintenant vous connecter </h4>
                   <div class='col text-center'>
                    <a href='sign-in.php' class='btn btn-success' type='button'>connexion</a>
                   </div>
            </div>
        </div>
    </div>
<?php

        ?><?php
    }
}
?>



<!-- FOOTER  -->
    <?php
            include "../base/footer.php";
    ?>  
    <?php
        include "../base/script.php";
    ?>
</body>
</html>