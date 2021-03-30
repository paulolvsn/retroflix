<?php

include_once("connect-to-bdd.php");



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// a variable to check if everything is ok, if it still 0 at the end, all is ok :) 
$score = 0;




// check if everything exist and put all in variables
if (isset($_POST['pseudo'])&&
    isset($_POST['email']) &&
    isset($_POST['email-check']) &&
    isset($_POST['password'])&&
    isset($_POST['password-check'])){
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $emailCheck = $_POST['email-check'];
        $password = $_POST['password'];
        $passwordCheck = $_POST['password-check'];
    }else{
        header('Location: create-account.php?failed=miss');
    }


$urlCallBack = "&email=$email&pseudo=$pseudo&emailCheck=$emailCheck"; 


// email check :

if ($email == $emailCheck){
    // echo "equals";
}else{
    $score ++;
    header("Location: create-account.php?failed=emailCheck$urlCallBack");
}


if (!filter_var(test_input($email), FILTER_VALIDATE_EMAIL)) {
    $score ++;
    header("Location: create-account.php?failed=invalidEmail$urlCallBack");

}

// password check
if($password != $passwordCheck){
    $score ++;
    header("Location: create-account.php?failed=passwordCheck$urlCallBack");
}

// password hashing
$pass_hache = password_hash($password, PASSWORD_DEFAULT);


// check if pseudo || email exist in db 
$reponse = $bdd->query('SELECT * FROM users');
while ($data = $reponse->fetch()){

    if ($data['pseudo'] == $pseudo){
        $score ++ ;
        header("Location: create-account.php?failed=pseudo-already-exist$urlCallBack");
    }
    if ($data['email'] == $email){
        $score ++ ;
        header("Location: create-account.php?failed=email-already-exist$urlCallBack");
    }

}

//upload avatar
$uniqueId = uniqid();
// File name
$filename = $_FILES['file']['name'];
// Location
$target_file = 'avatar/'. $uniqueId .$filename;
// file extension
$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);
// Valid image extension
$valid_extension = array("png","jpeg","jpg");


if(in_array($file_extension, $valid_extension)){

move_uploaded_file($_FILES['file']["tmp_name"],$target_file);

if ($score==0){
$req = $bdd->prepare('INSERT INTO users(pseudo, email, password, admin, avatar) VALUES(:pseudo, :email, :password, :admin,:avatar)');

$req->execute(array(
    'admin' => 0,
    'pseudo' => $pseudo,
    'password' => $pass_hache,
    'email' => $email,
    'avatar' => $target_file));

    //go to connexion page

    header("location: sign-in.php?regsiter=ok");

}}else{
    header("Location: create-account.php?failed=imageInvalid$urlCallBack");
}

?>
