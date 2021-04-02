<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update/Remove Comment</title>
        <meta name="viewport" content="width=device-width">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,700&display=swap" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row">
                    <h1>Update/Remove Comment</h1>
                    <table class="table bg-white table-hover border border-dark text-start">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Film ID</th>
                                <th scope="col">Text</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tr>
                            <form method="post" action="adminPanel.php">
                            <td></td>
                            <td><input class="form-control form-control-sm" type="date" name="date" required></td>
                            <td><select class="form-select form-select-sm" name="user_id" required>
                                <option selected>Choose user:</option>
                                <?php
                                include "connect-to-bdd.php"; // open database
                                $request = $bdd->query('SELECT * FROM users');
                                while ($user = $request->fetch()) {
                                    $user_id = $user['id'];
                                    $user_name = $user['pseudo'];
                                    echo "<option value=$user_id>$user_id: $user_name</option>";
                                }
                                $request->closeCursor(); // close database
                                ?>
                            </select></td>
                            <td><select class="form-select form-select-sm" name="film_id" required>
                                <option selected>Choose film:</option>
                                <?php
                                include "connect-to-bdd.php"; // open database
                                $request = $bdd->query('SELECT * FROM films');
                                while ($user = $request->fetch()) {
                                    $film_id = $user['id'];
                                    $film_name = $user['title'];
                                    echo "<option value=$film_id>$film_id: $film_name</option>";
                                }
                                $request->closeCursor(); // close database
                                ?>
                            </select></td>
                            <td><textarea class="form-control form-control-sm" name="text" placeholder="Comment" rows="3" style="width:100%" required></textarea></td>
                            <td><button class="btn btn-sm btn-success"type="submit" name="addComment">Add</button></td>
                            </form>
                        </tr>
                        <tbody>
                            <?php
                                include "connect-to-bdd.php"; // open database
                                // IF add button is clicked
                                if(isset($_POST['addComment'])) {
                                    echo "<script type='text/javascript'>function toggleAddComment(){addComment.classList.add('active');manageFilms.classList.remove('active');btnAddComment.classList.add('active');btnManageFilms.classList.remove('active');}toggleAddComment();</script>";
                                    $id = $_POST['addComment'];
                                    $date = $_POST['date'];
                                    $user_id = $_POST['user_id'];
                                    $film_id = $_POST['film_id'];
                                    $text = $_POST['text'];
                                    $request = $bdd->prepare('INSERT INTO comments(date, user_id, film_id, text) VALUES(?, ?, ?, ?)'); //prepare add command
                                    $request->execute(array($date, $user_id, $film_id, $text)); // add new element in database
                                    echo "<h4 class='text-success'>Le commentaire a été ajouté à la base de données.</h4>";   
                                }

                                // IF delete button is clicked
                                if(isset($_POST['removeComment'])) {
                                    echo "<script type='text/javascript'>function toggleAddComment(){addComment.classList.add('active');manageFilms.classList.remove('active');btnAddComment.classList.add('active');btnManageFilms.classList.remove('active');}toggleAddComment();</script>";
                                    $id = $_POST['removeComment'];
                                    $request = $bdd->prepare('DELETE FROM comments WHERE id = ?'); //prepare delete command
                                    $request->execute(array($id)); // delete comment from database
                                    echo "<h4 class='text-success'>Le commentaire a été supprimé de la base de données.</h4>";   
                                }
                                // IF confirm button is clicked to save changes
                                if(isset($_POST['saveComment'])) {
                                    echo "<script type='text/javascript'>function toggleAddComment(){addComment.classList.add('active');manageFilms.classList.remove('active');btnAddComment.classList.add('active');btnManageFilms.classList.remove('active');}toggleAddComment();</script>";
                                    $id = $_POST['saveComment'];
                                    $date = $_POST['date'];
                                    $user_id = $_POST['user_id'];
                                    $film_id = $_POST['film_id'];
                                    $text = $_POST['text'];
                                    $request = $bdd->prepare('UPDATE comments SET date=?, user_id=?, film_id=?, text=? WHERE id=?'); //prepare update command
                                    $request->execute(array($date, $user_id, $film_id, $text, $id)); // update Comment info
                                    echo "<h4 class='text-success'>Le commentaire a été mis à jour.</h4>";   
                                }
                                // generate Comment list table
                                $request = $bdd->query('SELECT * FROM comments');
                                while ($comment = $request->fetch()) {
                                    $id = $comment['id'];
                                    $date = $comment['date'];
                                    $user_id = $comment['user_id'];
                                    $film_id = $comment['film_id'];
                                    $text = $comment['text'];
                                    if( isset($_POST['updateComment']) AND ($comment['id'] == $_POST['updateComment'])) {
                                        echo "<script type='text/javascript'>function toggleAddComment(){addComment.classList.add('active');manageFilms.classList.remove('active');btnAddComment.classList.add('active');btnManageFilms.classList.remove('active');}toggleAddComment();</script>";
                                        echo "
                                            <tr id=$id>
                                            <td>$id</td>
                                            <form method='post' action='adminPanel.php' id='id$user_id$film_id'>
                                            <td><input class='form-control form-control-sm' type='date' name='date' value=$date></td>
                                            <td><input class='form-control form-control-sm' type='number' name='user_id' value=$user_id></td>
                                            <td><input class='form-control form-control-sm' type='number' name='film_id' value=$film_id></td>
                                            <td><textarea class='form-control form-control-sm' name='text' style='resize: none; width: 100%;' rows='5' form='id$user_id$film_id'>$text</textarea></td>
                                            <td><button class='btn btn-sm btn-success' type='submit' name='saveComment' value=$id>Enregistrer</button>
                                            </form>
                                            <br>
                                            <br>
                                            <form method='post' action='adminPanel.php'>
                                            <button class='btn btn-sm btn-danger' type='submit' name='removeComment' value=$id>Supprimer</button>
                                            </form>
                                            </td>
                                            </tr>
                                        ";
                                    }
                                    else {
                                        echo "
                                            <tr id=$id>
                                            <td>$id</td>
                                            <td>$date</td>
                                            <td>$user_id</td>
                                            <td>$film_id</td>
                                            <td>$text</td>
                                            <td>
                                            <form method='post' action='adminPanel.php#$id'>
                                            <button class='btn btn-sm btn-primary' type='submit' name='updateComment' value=$id>Changer</button>
                                            </form>
                                            <br>
                                            <form method='post' action='adminPanel.php'>
                                            <button class='btn btn-sm btn-danger' type='submit' name='removeComment' value=$id>Supprimer</button>
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