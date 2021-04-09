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
<!-- FORM -->
    <div class="container">
        <div class="row mt-5 mx-5 justify-content-center">
            <div class="col-6 border border-white border-1 rounded shadow p-3 mb-5 mt-5">
                <form action="password-recovery-form-check.php" method="post">
                    <label class="form-label" for="email">Veuillez entrer votre email</label>
                    <input class="form-control" type="email" required name="email">   
                    <br>      
                    <input class="btn btn-outline-secondary btn-block" type="submit" value="get a new password">
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
