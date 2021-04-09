<?php
    include('check-session.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <?php
        include("../base/head.php");
    ?>
  <body class="bg-dark text-white">
        <?php
            include("../base/header.php");
        ?> 
        <main class="container">
            <?php
                include_once('../users/connect-to-bdd.php');
                function changesMess() {
                    if(isset($_GET['changes'])) {
                        if($_GET['changes']=="ok") {
                            $message = "<p>changes were made successfully!</p>";
                            return $message;
                        } else {
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
                if(isset($_SESSION['admin'])) {
                    if($_SESSION['admin'] == 1) {
                    echo "
                        <div role='tabpanel'>
                        <!-- List group -->
                        <div class='list-group list-group-horizontal' id='userPanel' role='tablist'>
                            <a class='list-group-item list-group-item-action active' id='btnAdminPanel' data-bs-toggle='list' href='#admin' role='tab'>Admin Panel</a>
                            <a class='list-group-item list-group-item-action' id='btnUserPanel' data-bs-toggle='list' href='#user' role='tab'>User Panel</a>
                        </div>
                        <!-- Tab panes -->
                        <div class='tab-content'>
                        <div class='tab-pane' id='user' role='tabpanel'>
                    ";
                    }
                }
            ?>
            <div class="container" >
            <div class="row d-flex justify-content-center">
                <div class="col-auto border rounded my-5 p-3 bg-body text-dark">      
                    <form method='POST' enctype=multipart/form-data action="user-save-changes.php">
                    <div class="card form-control" >
                        <h3> <?php echo "Welcome " . $pseudo;   ?></h3>
                        <?php  echo '<img id="avatarDisplay" src="'.$avatar.'" alt="avatar"><br>'; ?>
                        <div class="card-body">
                            <input class="form-control" id=avatar type='file' name='file'/>
                        </div>
                    </div>              
                    <label for="oldPass">Old password</label><br>
                    <input type="password" name="oldPass"><br>
                    <label for="newPass">New password</label><br>
                    <input type="password" name="newPass"><br>
                    <label for="newPass2">New password confirmation</label><br>
                    <input type="password" name="newPass2"><br>
                    <div class="d-grid gap-2 mt-3">    
                        <input class="btn btn-outline-primary btn-block"  type="submit" value="Save Changes"><br>
                    </div> 
                    <div class="form-text">
                        <?php echo changesMess(); ?>
                    </div>
                    </form>
                </div>
            </div>
            <?php
                if(isset($_SESSION['admin'])) {
                    if($_SESSION['admin'] == 1) {
                        echo "
                            </div>
                            </div>
                            <div class='tab-pane active' id='admin' role='tabpanel'>                
                        ";
                        include "../users/connect-to-bdd.php"; // open database
                        include "../key.php"; // load API key
                        include "../admin/adminPanel.php";
                        echo "
                            </div>
                        ";
                    }
                }
            ?>
          </div>
        </div>
      </main>
      <?php
        include('../base/footer.php');
      ?>
    <?php
        include "../base/script.php";
    ?>
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
            } else {
                alert("THE FILE IS TOO BIG! 2MO MAX!");
            }    
        });
    </script>  
  </body>
</html>

