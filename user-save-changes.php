<?php

include('check-session.php');
include_once('connect-to-bdd.php');

$avatarToDelete = $_SESSION['avatar'];
// CHANGE AVATAR

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

echo $_FILES['file']['name'];;


if(in_array($file_extension, $valid_extension)){ 
unlink($avatarToDelete);
move_uploaded_file($_FILES['file']["tmp_name"],$target_file);
$req = $bdd->prepare('UPDATE users SET avatar = :target WHERE pseudo = :pseudo');
$req->execute(array(
    "target" => $target_file,
    "pseudo" => $_SESSION['pseudo']
));
// header("Location: account.php");


}

echo $_POST['oldPass'] . "<br>";
echo $_POST['newPass'] . "<br>";
echo $_POST['newPass2'] . "<br>";