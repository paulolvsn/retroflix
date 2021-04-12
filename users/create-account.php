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


        
            <div class="row mt-5 mx-5 justify-content-center">
                
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
                        <p class="text mt-4">Ou...Chosir de cette liste: </p>
                        

                  
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1"><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/angelam.png" alt="Angela Merkel"></a></option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="avatardd" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="200,-130">
                                Images disponibles
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/angelam.png" alt="Angela Merkel"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/gandhi.png" alt="Gandhi"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/ernestoche.png" alt="Che Guevara"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/kennedy.png" alt="Kennedy"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/mlutherk.png" alt="Martin L.King"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/putin.png" alt="Putin"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/einstein.png" alt="Einstein"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/isabel.png" alt="Queen Elisabeth"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/obama.png" alt="Obama"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/lenin.png" alt="Lenin"></a></li>
                                <li><a class="dropdown-item" href="#"><img width="60px" height="auto" src="avatar/dalai.png" alt="Dalai Lama"></a></li>
                                
                                
                            </ul>
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
    </body>
</html>