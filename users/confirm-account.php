<?php
if(isset($_GET['email']) && isset($_GET['str'])){
    include('connect-to-bdd.php');
    $email = $_GET['email'];
    
    $req = $bdd->query("SELECT recovery FROM users WHERE email = '$email'");

    while ($data = $req->fetch()){

    $recoveryTest = $data['recovery'];
    
    }
    if($recoveryTest == $_GET['str']){
        $req = $bdd->prepare('UPDATE users SET valid = 1 WHERE email = :email');
        $req->execute(array(
        "email" => $email
        ));
        echo "<p> Thank you, your account have been activated! </p>";
        ?><br><a href="sign-in.php">sign-in</a><?php
    }
}



?>