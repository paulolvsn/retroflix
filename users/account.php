<?php

include('check-session.php');
include_once('connect-to-bdd.php');

function changesMess(){
  if(isset($_GET['changes'])){
    if($_GET['changes']=="ok"){
      $message = "<p>changes were made successfully!</p>";
      return $message;
    }else{
      $message = "<p>Something went wrong password are incorrect, please try again.</p>";
      return $message;
    }
  }
}


$pseudo = $_SESSION['pseudo'];
$reponse = $bdd->query("SELECT avatar, email, pseudo FROM users WHERE pseudo='$pseudo'");
$data = $reponse->fetch();
$_SESSION['avatar']= $data['avatar'];
$avatar = $data['avatar'];
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<div class="container" >
    <div class="row mt-5">
        <div class="mt-5 col-3 offset-4 border border-dark border-2 rounded shadow p-3 mb-5 bg-body rounded">      
          <form method='POST' enctype=multipart/form-data action="user-save-changes.php">
                    <div class="card form-control" >
                      <h3> <?php echo "Welcome " . $pseudo;   ?></h3>
                      <?php  echo  '<img id="avatarDisplay" src="'.$avatar.'" alt="avatar"><br>'; ?>    
                      <div class="card-body">
                        <input class="form-control" id=avatar type='file' name='file'/>
                      </div>
                    </div>              
                    <label for="oldPass">old password</label><br>
                    <input type="password" name="oldPass"><br>
                    <label for="newPass">new password</label><br>
                    <input type="password" name="newPass"><br>
                    <label for="newPass2">new password Confirmation</label><br>
                    <input type="password" name="newPass2"><br>
                    <div class="d-grid gap-2 mt-3">    
                    <input class="btn btn-outline-primary btn-block"  type="submit" value="Save Changes"><br>
                    </div> 
                    <div class="form-text"><?php echo changesMess(); ?></div>
          </form>
        </div>
    </div>
</div>
      






<script>
//! PREVIEW AVATAR BEFORE UPLOAD AND CHECK SIZE
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


