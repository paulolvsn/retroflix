<!DOCTYPE html>
<html lang="fr">
    <?php
        include "../base/head.php";
    ?>
    <body class="bg-dark text-white">
        <?php
            include "../base/header.php";
        ?> 
        <main class="container">
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
            <div class="row my-5 justify-content-center">                
                <div class="col-6 border border-white border-2 rounded shadow p-3 mb-5 mt-5">
                    <form action="create-account-check.php" method="post" enctype='multipart/form-data'>
                        <h2 class="text-center">S'inscrire</h2>
                            
                        <div class="card form-control" >
                            <img class="figure-img img-fluid mx-3" id="avatarDisplay" width="460px" height="auto" src="avatar/avatar.jpg"  alt="avatar"><br>
                                             
                            <div class="card-body">
                                <label for="avatar" class="form-label">Téléchargez votre image</label>
                                <input class="form-control" id=avatar type='file' name='file'/>                                                                  
                            </div>
                        </div>
                        
                        <select class="vodiapicker" id="avatargallery">
                            <option value="/avatar/angelam.png" data-thumbnail="/avatar/angelam.png" name="avatar"></option>
                            <option value="/avatar/lenin.png" data-thumbnail="/avatar/lenin.png" name="avatar"></option>
                            <option value="/avatar/dalai.png" data-thumbnail="/avatar/dalai.png" name="avatar"></option>
                            <option value="/avatar/einstein.png" data-thumbnail="/avatar/einstein.png" name="avatar"></option>
                            <option value="/avatar/ernestoche.png" data-thumbnail="/avatar/ernestoche.png" name="avatar"></option>
                            <option value="/avatar/kennedy.png" data-thumbnail="/avatar/kennedy.png" name="avatar"></option>
                            <option value="/avatar/gandhi.png" data-thumbnail="/avatar/gandhi.png" name="avatar"></option>
                            <option value="/avatar/donald.png" data-thumbnail="/avatar/donald.png" name="avatar"></option>
                            <option value="/avatar/isabel.png" data-thumbnail="/avatar/isabel.png" name="avatar"></option>
                            <option value="/avatar/mlutherk.png" data-thumbnail="/avatar/mlutherk.png" name="avatar"></option>
                            <option value="/avatar/obama.png" data-thumbnail="/avatar/obama.png" name="avatar"></option>
                            <option value="/avatar/putin.png" data-thumbnail="/avatar/putin.png" name="avatar"></option>
                        </select>

                        <div class="lang-select">
                            <button class="btn-select" value=""></button>
                            <div class="b">
                                <ul id="a"></ul>
                            </div>
                        </div>

                        <br>
                        <label class="form-label"  for="pseudo">pseudo :</label>
                        <input class="form-control" type="text" name="pseudo" value="<?php getEcho('pseudo') ?>"required><br>

                        <label class="form-label"  for="email">email :</label>
                        <input class="form-control" type="email" name="email" value="<?php getEcho('email') ?>" required><br>

                        <label class="form-label"  for="email-check">confirm email :</label>
                        <input class="form-control" type="email" name="email-check" value="<?php getEcho('emailCheck') ?>" required><br>

                        <label class="form-label"  for="password">password :</label>
                        <input class="form-control" type="password" name="password" required><br>

                        <label class="form-label"  for="password-check">confirm password :</label>
                        <input class="form-control" type="password" name="password-check" required><br>

                        <div class="d-grid gap-2">    
                            <input class="btn btn-outline-secondary btn-block"  type="submit" value="register"><br>
                        </div>
                        <p class="text-center">or <a href="sign-in.php"> Sign-in</a></p>
                    </form>
                </div>
            </div>
        </main>
        <?php
            include "../base/footer.php";
        ?>  
        <?php
            include "../base/script.php";
        ?>
        <script>
//test for getting url value from attr
// var img1 = $('.test').attr("data-thumbnail");
// console.log(img1);

//test for iterating over child elements
var langArray = [];
$('.vodiapicker option').each(function(){
    var img = $(this).attr("data-thumbnail");
    var text = this.innerText;
    var value = $(this).val();
    var item = '<li><img src="'+ img +'" alt="" value="'+value+'"/><span>'+ text +'</span></li>';
    langArray.push(item);
})

$('#a').html(langArray);

//Set the button value to the first el of the array
$('.btn-select').html(langArray[0]);
$('.btn-select').attr('value', 'en');

//change button stuff on click
$('#a li').click(function(){
   var img = $(this).find('img').attr("src");
   var value = $(this).find('img').attr('value');
   var text = this.innerText;
   var item = '<li><img src="'+ img +'" alt="" /><span>'+ text +'</span></li>';
  $('.btn-select').html(item);
  $('.btn-select').attr('value', value);
  $(".b").toggle();
  //console.log(value);
});

$(".btn-select").click(function(){
        $(".b").toggle();
    });

//check local storage for the lang
var sessionLang = localStorage.getItem('lang');
if (sessionLang){
  //find an item with value of sessionLang
  var langIndex = langArray.indexOf(sessionLang);
  $('.btn-select').html(langArray[langIndex]);
  $('.btn-select').attr('value', sessionLang);
} else {
   var langIndex = langArray.indexOf('ch');
  console.log(langIndex);
  $('.btn-select').html(langArray[langIndex]);
  //$('.btn-select').attr('value', 'en');
}

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
            if (parseInt(size)<2000000) {
                readURL(this);
            } else {
                alert("THE FILE IS TOO BIG! 2MO MAX!");
            }
        });
        </script>    
    </body>
</html>