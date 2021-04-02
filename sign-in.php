<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<?php 
if(isset($_GET['register'])){
    if($_GET['register']=="ok"){
        echo "<p> Your account have been created. Last step, connect to your account </p>";
    }    
}

?>

<form action="sign-in-check.php" method="post">
    <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo"><br>
    <label for="password">password</label>
        <input type="password" name="password">
        <br>
    <input type="submit" value="connexion">
    <a href="password-recovery-form.php">Forgotten password?</a><br>
    <a href="create-account.php">Create an Account</a>
</form>