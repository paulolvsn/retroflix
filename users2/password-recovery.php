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
        $req = $bdd->prepare('UPDATE users SET recovery = "" WHERE email = :email');
        $req->execute(array(
        "email" => $email
        ));
}}
?>

<!-- FORM -->
<div class="container">
        <div class="row mt-5 mx-5 justify-content-center">
            <div class="col-6 border border-white border-1 rounded shadow p-3 mb-5 mt-5">
                <form action="password-recovery-check.php?email=<?php echo $email?>" method="post">
                    <label class="form-label" for="pass1">Veuillez entrer votre noveau mot de passe</label>
                    <input class="form-control" type="password" required name="pass1">   
                    <label class="form-label" for="pass2">Confirmez votre mot de passe</label>
                    <input class="form-control" type="password" required name="pass2">   
                    <br>    
                    <div class='col text-center'>  
                      <input class="btn btn-outline-secondary btn-block" type="submit" value="enregistrer">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- FOOTER  -->
    <?php
            include "../base/footer.php";
    ?>  
    <?php
        include "../base/script.php";
    ?>
</body>
</html>