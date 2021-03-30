<?php

function errorMessage($mess){
    $out = "";
    if($mess == 'miss'){
        $out = "something is missing";
    }
    if($mess == 'emailCheck'){
        $out = "emails are not equivalents!";
    }
    if($mess == 'invalidEmail'){
        $out = "email not valid!";
    }
    if($mess == 'passwordCheck'){
        $out = "password are not equivalents!";
    }
    if($mess == 'pseudo-already-exist'){
        $out = "this pseudo already exist!";
    }
    if($mess == 'email-already-exist'){
        $out = "This email already exist!";
    }
    if($mess == "invalidImage"){
        $out = "Wrong image type, please use jpeg or png";
    }
    return $out;
}



if(isset($_GET['failed'])){
    echo "<p style='color:red;'> " . errorMessage($_GET['failed']) . "</p>";
}
?>


<form action="create-account-check.php" method="post" enctype='multipart/form-data'>

    <label for="pseudo">pseudo :</label>
        <input type="text" name="pseudo" value="<?php echo $_GET['pseudo'] ?>"required>
        <input type='file' name='file' multiple />
        <br>

    <label for="email">email :</label>
        <input type="email" name="email" value="<?php echo $_GET['email'] ?>" required><br>

    <label for="email-check">confirm email :</label>
        <input type="email" name="email-check" value="<?php echo $_GET['emailCheck'] ?>" required><br>

    <label for="password">password :</label>
        <input type="password" name="password" required><br>

    <label for="password-check">confirm password :</label>
        <input type="password" name="password-check" required><br>

    <input type="submit" value="register">
</form>