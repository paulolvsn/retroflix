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
            <div class="col-4 border border-white border-1 rounded shadow p-3 mb-5 mt-5">
                   <h4>Un email a été envoyé à l'adresse <?php echo $_GET['email']  ?> . <br> Veuillez vérifier votre boite mail. </h4>
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