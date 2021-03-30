<?php

include('check-session.php');
include_once('connect-to-bdd.php');

$pseudo = $_SESSION['pseudo'];

echo "Welcome " . $pseudo;

$reponse = $bdd->query("SELECT avatar, email, pseudo FROM users WHERE pseudo='$pseudo'");
?>
<div>
<form method='POST' enctype=multipart/form-data action="change-avatar.php">
<?php
while ($data = $reponse->fetch()){
    $_SESSION['avatar']= $data['avatar'];
    $avatar = $data['avatar'];
    echo  '<img id="avatarDisplay" src="'.$avatar.'" width="250" alt="avatar"><br>';
    echo '<input id=avatar type="file" name="file"/> <br>';
    echo '<input type="submit" value="change avatar"/> <br>';
    echo $data['email'] . "<br>" ;
    echo $data['pseudo'] . "<br>" ;

}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</form>
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


<?php
