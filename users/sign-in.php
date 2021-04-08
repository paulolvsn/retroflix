<?php
    include "../users/check-session.php";
?>

<!DOCTYPE html>
<html lang="fr">
    <?php
        include "../base/head.php";
    ?>
    <body class="bg-dark text-white">
    <header>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-warning fs-3" href="/index.php">RETROFLIX</a>
      </header>
        <main class="container-fluid">


            <?php 
            if(isset($_GET['register'])){
                if($_GET['register']=="ok"){
                    echo "<p> Your account have been created. Last step, connect to your account </p>";
                }    
            }

            ?>

            <div class="container" >
                <div class="row mt-5">
                    <div class="mt-5 col-2 offset-5 border border-dark border-2 rounded shadow p-3 mb-5 bg-body rounded">
                        <form  action="sign-in-check.php" method="post">
                            <label class="form-label text-body" for="pseudo">Pseudo</label>
                            <input class="form-control"  type="text" name="pseudo"><br>
                            <label class="form-label text-body" for="password">Password</label>
                            <input class="form-control"  type="password" name="password">
                            <br>
                            <div class="d-grid gap-2">    
                                <input class="btn btn-outline-primary btn-block text-warning"  type="submit" value="connexion"><br>
                            </div>
                            <a class="link-secondary" href="create-account.php">Create an account</a>
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

