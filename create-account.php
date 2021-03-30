<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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

  
        <div>
            <img id="avatarDisplay" src="avatar/avatar.jpg" width="250" alt="avatar"><br>
            <input id=avatar type='file' name='file'/>
        </div>
        <br>
        <label for="pseudo">pseudo :</label>
            <input type="text" name="pseudo" value="<?php echo $_GET['pseudo'] ?>"required>
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
    or <a href="sign-in.php">Sign-in</a>
</form>


<script>
//! PREVIEW AVATAR BEFORE UPLOAD
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#avatarDisplay').attr('src', e.target.result);
    }


    
    reader.readAsDataURL(input.files[0]); 
  }
}

$("#avatar").change(function() {
    var size = document.getElementById('avatar').files[0].size;
    if (parseInt(size)<2000000){
  readURL(this);
}else{
    alert("THE FILE IS TOO BIG! 2MO MAX!");
}
  
});
</script>