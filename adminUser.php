<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update/Remove User</title>
        <meta name="viewport" content="width=device-width">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row">
                    <h1>Update/Remove User</h1>
                    <table class="table bg-white table-hover border border-dark text-start">
                        <thead>
                            <tr>
                                <th scope="col">Avatar</th>
                                <th scope="col">ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Pseudo</th>
                                <th scope="col">Email</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Password</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tr>
                            <form method="post" action="adminPanel.php" enctype="multipart/form-data">
                                <td><input class="form-control form-control-sm" type="file" name="avatar" id="avatar" required></td>
                                <td></td>
                                <td><input class="form-control form-control-sm" type="date" name="date" required></td>
                                <td><input class="form-control form-control-sm" type="text" name="pseudo" placeholder="Pseudo" required></td>
                                <td><input class="form-control form-control-sm" type="email" name="email" placeholder="Email"required></td>
                                <td><input class="form-control form-control-sm" type="number" name="admin" placeholder="0/1"required></td>
                                <td><input class="form-control form-control-sm" type="password" name="password" required></td>
                                <td><button class="btn btn-sm btn-success w-100" type="submit" name="addUser">Add</button></td>
                            </form>
                        </tr>
                        <tbody>
                            <?php
                                include "connect-to-bdd.php"; // open database
                                // IF add button is clicked
                                if(isset($_POST['addUser'])) {
                                    echo "<script type='text/javascript'>function toggleUser(){manageUsers.classList.add('active');manageFilms.classList.remove('active');btnManageUsers.classList.add('active');btnManageFilms.classList.remove('active');}toggleUser();</script>";
                                    $target_dir = "avatar/";
                                    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                    // Check if image file is a actual image or fake image
                                    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                                    if($check !== false) {
                                        //echo "File is an image - " . $check["mime"] . ".";
                                        $uploadOk = 1;
                                    } else {
                                        echo "<h4 class='text-left text-danger'>File is not an image.</h4>";
                                        $uploadOk = 0;
                                    }
                                    // Check if file already exists
                                    if (file_exists($target_file)) {
                                        echo "<h4 class='text-left text-danger'>Sorry, file already exists.</h4>";
                                        $uploadOk = 0;
                                    }
                                    // Check file size
                                    if ($_FILES["avatar"]["size"] > 500000) {
                                        echo "<h4 class='text-left text-danger'>Sorry, your file is too large.</h4>";
                                        $uploadOk = 0;
                                    }
                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "gif" ) {
                                        echo "<h4 class='text-left text-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h4>";
                                        $uploadOk = 0;
                                    }
                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) {
                                        echo "<h4 class='text-left text-danger'>Sorry, your file was not uploaded.</h4>";
                                    // if everything is ok, try to upload file
                                    } else {
                                        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                                            echo "<h4 class='text-left text-success'>Your file has been uploaded.</h4>";
                                        } else {
                                            echo "<h4 class='text-left text-danger'>Sorry, there was an error uploading your file.</h4>";
                                        }
                                    }
                                    $date = $_POST['date'];
                                    $pseudo = $_POST['pseudo'];
                                    $email = $_POST['email'];
                                    $admin = $_POST['admin'];
                                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                    $avatar = "avatar/" . $_FILES['avatar']['name'];
                                    $request = $bdd->prepare('INSERT INTO users(date, pseudo, email, admin, password, avatar) VALUES(?, ?, ?, ?, ?, ?)'); //prepare add command
                                    $request->execute(array($date, $pseudo, $email, $admin, $password, $avatar)); // add new element in database
                                    echo "<h4 class='text-success'>Le utilisateur a été ajouté à la base de données.</h4>";   
                                }

                                // IF delete button is clicked
                                if(isset($_POST['removeUser'])) {
                                    echo "<script type='text/javascript'>function toggleUser(){manageUsers.classList.add('active');manageFilms.classList.remove('active');btnManageUsers.classList.add('active');btnManageFilms.classList.remove('active');}toggleUser();</script>";
                                    $id = $_POST['removeUser'];
                                    $request = $bdd->prepare('SELECT * FROM users WHERE id = ?'); // prepare search command
                                    $request->execute(array($id)); // search element in database
                                    $user = $request->fetch();
                                    $avatar = $user['avatar'];
                                    unlink($avatar); //delete image from folder
                                    $request = $bdd->prepare('DELETE FROM users WHERE id = ?'); //prepare delete command
                                    $request->execute(array($id)); // delete user from database
                                    echo "<h4 class='text-success'>Le utilisateur a été supprimé de la base de données.</h4>";   
                                }
                                // IF confirm button is clicked to save changes
                                if(isset($_POST['saveUser'])) {
                                    echo "<script type='text/javascript'>function toggleUser(){manageUsers.classList.add('active');manageFilms.classList.remove('active');btnManageUsers.classList.add('active');btnManageFilms.classList.remove('active');}toggleUser();</script>";
                                    $id = $_POST['saveUser'];
                                    $date = $_POST['date'];
                                    $pseudo = $_POST['pseudo'];
                                    $email = $_POST['email'];
                                    $admin = $_POST['admin'];
                                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                    $request = $bdd->prepare('UPDATE users SET date=?, pseudo=?, email=?, admin=?, password=? WHERE id=?'); //prepare update command
                                    $request->execute(array($date, $pseudo, $email, $admin, $password, $id)); // update user info
                                    echo "<h4 class='text-success'>Le utilisateur a été mis à jour.</h4>";   
                                }
                                // generate user list table
                                $request = $bdd->query('SELECT * FROM users');
                                while ($user = $request->fetch()) {
                                    $id = $user['id'];
                                    $date = $user['date'];
                                    $pseudo = $user['pseudo'];
                                    $email = $user['email'];
                                    $admin = $user['admin'];
                                    $password = $user['password'];
                                    $avatar = $user['avatar'];
                                    if( isset($_POST['updateUser']) AND ($user['id'] == $_POST['updateUser'])) {
                                        echo "<script type='text/javascript'>function toggleUser(){manageUsers.classList.add('active');manageFilms.classList.remove('active');btnManageUsers.classList.add('active');btnManageFilms.classList.remove('active');}toggleUser();</script>";
                                        echo "
                                            <tr id=$id>
                                            <form method='post' action='adminPanel.php'>
                                            <td><img src='$avatar' alt='$pseudo' width='50px' height='auto'></td>
                                            <td><input class='form-control form-control-sm' type='number' name='id' value=$id></td>
                                            <td><input class='form-control form-control-sm' type='date' name='date' value=$date></td>
                                            <td><input class='form-control form-control-sm' type='text' name='pseudo' value=$pseudo></td>
                                            <td><input class='form-control form-control-sm' type='email' name='email' value=$email></td>
                                            <td><input class='form-control form-control-sm' type='number' name='admin' value=$admin></td>
                                            <td><input class='form-control form-control-sm' type='password' name='password' value=$password></td>
                                            <td><button class='btn btn-sm btn-success w-100' type='submit' name='saveUser' value=$id>Enregistrer</button>
                                            </form>
                                            <br>
                                            <br>
                                            <form method='post' action='adminPanel.php'>
                                            <button class='btn btn-danger' type='submit' name='removeUser' value=$id>Supprimer</button>
                                            </form>
                                            </td>
                                            </tr>
                                        ";
                                    }
                                    else {
                                        echo "
                                            <tr id=$id>
                                            <td><img src='$avatar' alt='$pseudo' width='50px' height='auto'></td>
                                            <td>$id</td>
                                            <td>$date</td>
                                            <td>$pseudo</td>
                                            <td>$email</td>
                                            <td>$admin</td>
                                            <td><span class='text-break'>$password</span></td>
                                            <td>
                                            <form method='post' action='adminPanel.php#$id'>
                                            <button class='btn btn-sm btn-primary w-100' type='submit' name='updateUser' value=$id>Changer</button>
                                            </form>
                                            <br>
                                            <form method='post' action='adminPanel.php'>
                                            <button class='btn btn-sm btn-danger w-100' type='submit' name='removeUser' value=$id>Supprimer</button>
                                            </form>
                                            </td>
                                            </tr>
                                        ";
                                    }
                                }
                                $request->closeCursor(); // close database
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>