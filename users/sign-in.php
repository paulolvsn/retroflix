<?php
    include "../users/check-session.php";
    

    function getError(){
        if(isset($_GET['error'])){
            if ($_GET['error']=="0"){
                return '<p style="color:red;">Mauvais identifiant ou mot de passe !</p>';
            }else{
                return '<p style="color:red;">Your account is not activated yet. <br> Please check your inbox mail and follow the link</p>';
            }
        }}
?>
<!DOCTYPE html>
<html lang="fr">
    <?php
        include "../base/head.php";
    ?>
    <body class="bg-dark text-white">
        <?php
            include "../base/header.php";
        ?>  
        <main class="container-fluid">
            <?php 
                if(isset($_GET['register'])){
                    if($_GET['register']=="ok"){
                        echo "<p> Your account have been created. Last step, connect to your account </p>";
                    }    
                }
            ?>
            <div class="container" >
                <div class="row d-flex justify-content-center my-5">
                    <div class="col-auto border border-dark rounded p-3 my-5 bg-body">
                        <form  action="sign-in-check.php" method="post">
                        <div id="emailHelp" class="form-text danger"><?php echo getError()?></div>                        
                            <label class="form-label text-body" for="pseudo">Pseudo</label>
                            <input class="form-control"  type="text" name="pseudo"><br>
                            <label class="form-label text-body" for="password">Password</label>
                            <input class="form-control"  type="password" name="password">
                            <br>
                            <div class="d-grid gap-2">    
                                <input class="btn btn-outline-primary btn-block text-warning"  type="submit" value="connexion"><br>
                            </div>
                            <a class="link-secondary" href="create-account.php">Create an account</a><br>
                            <a class="link-secondary" href="password-recovery-form.php">Forgot your password?</a><br>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php
            include "../base/footer.php";
        ?>  
        <?php
            include "../base/script.php";
        ?>   
    </body>
</html>

