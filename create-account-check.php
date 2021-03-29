<?php




// check if everything exist and put all in variables
if (isset($_POST['pseudo'])&&
    isset($_POST['email']) &&
    isset($_POST['email-check']) &&
    isset($_POST['password'])&&
    isset($_POST['passwordCheck'])){
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $emailCheck = $_POST['email-check'];
        $password = $_POST['password'];
        $passwordCheck = $_POST['passwordCheck'];
    }


// email check :

if($email =! $emailCheck){

}



if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: create-account.php?failed=emailNotValid');
}
