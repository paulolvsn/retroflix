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


// if the user try to change the avatar
if (isset($_FILES['file']['name'])&&(strlen($_FILES['file']['name']) > 0)){
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
}

//if the user try to change the password
if (isset($_POST['oldPass'])&&
    isset($_POST['newPass'])&&
    isset($_POST['newPass2'])){
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $newPass2 = $_POST['newPass2'];
        if(strlen('oldPass')>0&&strlen('newPass')>0&&strlen('newPass2')>0){
            if (($newPass==$newPass2)){//validation form
                $pseudo = $_SESSION['pseudo'];
                $reponse = $bdd->query("SELECT avatar, password, email, pseudo FROM users WHERE pseudo='$pseudo'");
                $data = $reponse->fetch();
                $passFromDb = $data['password'];
                $newPassHashed = password_hash($newPass,PASSWORD_DEFAULT);
                $oldPassHashed = password_hash($oldPass,PASSWORD_DEFAULT);
                $isPasswordCorrect = password_verify($oldPass, $passFromDb);
                if($isPasswordCorrect){//validation pass
                    $req = $bdd->prepare('UPDATE users SET password = :password WHERE pseudo = :pseudo');
                    $req->execute(array(
                        "password" => $newPassHashed,
                        "pseudo" => $pseudo
                    ));
                    header("Location: account.php?changes=ok");
                }else{
                    header("Location: account.php?changes=failed");
                }
            }else{header("Location: account.php?changes=failed");}
        }
    }
