<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
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

function getEcho($data){
    if(isset($_GET["$data"])){
        echo $_GET["$data"];
    }
}

if(isset($_GET['failed'])){
    echo "<p style='color:red;'> " . errorMessage($_GET['failed']) . "</p>";
}
?>


<div class="container" >
    <div class="row mt-5">
        <div class="mt-5 col-3 offset-4 border border-dark border-2 rounded shadow p-3 mb-5 bg-body rounded">
            <form action="create-account-check.php" method="post" enctype='multipart/form-data'>


                    <div>
                    <div class="card form-control" >
                        <img id="avatarDisplay" src="avatar/avatar.jpg"  alt="avatar"><br>
                        <div class="card-body">
                        <input class="form-control" id=avatar type='file' name='file'/>
                        </div>
                    </div>
                    </div>
                    <br>
                    <label class="form-label"  for="pseudo">pseudo :</label>
                        <input class="form-control" type="text" name="pseudo" value="<?php getEcho('pseudo') ?>"required>
                    <br>

                <label class="form-label"  for="email">email :</label>
                    <input class="form-control" type="email" name="email" value="<?php getEcho('email') ?>" required><br>

                <label class="form-label"  for="email-check">confirm email :</label>
                    <input class="form-control" type="email" name="email-check" value="<?php getEcho('emailCheck') ?>" required><br>

                <label class="form-label"  for="password">password :</label>
                    <input class="form-control" type="password" name="password" required><br>

                <label class="form-label"  for="password-check">confirm password :</label>
                    <input class="form-control" type="password" name="password-check" required><br>

                    <div class="d-grid gap-2">    
                    <input class="btn btn-outline-primary btn-block"  type="submit" value="register"><br>
                    </div>
                or <a href="sign-in.php">Sign-in</a>
            </form>
        </div>
    </div>
</div>




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