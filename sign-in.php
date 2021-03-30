<?php 

if(isset($_GET['register'])){
    echo "<p> Your account have been created. Last step, connect to your account </p>";
}

?>

<form action="sign-in-check.php" method="post">
    <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo"><br>
    <label for="password">password</label>
        <input type="password" name="password">
        <br>
    <input type="submit" value="connexion">
</form>