<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update/Remove Film</title>
        <meta name="viewport" content="width=device-width">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row">
                    <h1>Update/Remove Film</h1>
                    <table class="table bg-white table-hover border border-dark text-start">
                        <thead>
                            <tr>
                                <th scope="col">Poster</th>
                                <th scope="col">ID</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Titre original</th>
                                <th scope="col">Genres</th>
                                <th scope="col">Synopsis</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "connect-to-bdd.php"; // open database
                                // IF delete button is clicked
                                if(isset($_POST['removeFilm'])) {
                                    $id = $_POST['removeFilm'];
                                    $request = $bdd->prepare('DELETE FROM films WHERE id = ?'); //prepare delete command
                                    $request->execute(array($id)); // delete film from database
                                    echo "<h4 class='text-success'>Le film a été supprimé de la base de données.</h4>";   
                                }
                                // IF confirm button is clicked to save changes
                                if(isset($_POST['saveFilm'])) {
                                    $id = $_POST['saveFilm'];
                                    $title = $_POST['title'];
                                    $original_title = $_POST['original_title'];
                                    $genres = $_POST['genres'];
                                    $overview = $_POST['overview'];
                                    $request = $bdd->prepare('UPDATE films SET title=?, original_title=?, genres=?, overview=? WHERE id=?'); //prepare update command
                                    $request->execute(array($title, $original_title, $genres, $overview, $id)); // update film info
                                    echo "<h4 class='text-success'>Le film a été mis à jour.</h4>";   
                                }
                                // generate film list table
                                $request = $bdd->query('SELECT * FROM films');
                                while ($film = $request->fetch()) {
                                    $poster_path = $film['poster_path'];
                                    $id = $film['id'];
                                    $title = $film['title'];
                                    $original_title = $film['original_title'];
                                    $genres = $film['genres'];
                                    $overview = $film['overview'];
                                    if( isset($_POST['updateFilm']) AND ($film['id'] == $_POST['updateFilm'])) {
                                        echo "
                                            <tr id=$id>
                                            <td><img src='https://image.tmdb.org/t/p/w92/$poster_path' alt='$title'></td>
                                            <td>$id</td>
                                            <form method='post' action='adminRemoveFilm.php' id='$title'>
                                            <td><textarea name='title' style='resize: none; width: 100%;' rows='5' form='$title'>$title</textarea></td>
                                            <td><textarea name='original_title' style='resize: none; width: 100%;' rows='5' form='$title'>$original_title</textarea></td>
                                            <td><textarea name='genres' style='resize: none; width: 100%;' rows='5' form='$title'>$genres</textarea></td>
                                            <td><textarea name='overview' style='resize: none; width: 100%;' rows='5' form='$title'>$overview</textarea></td>
                                            <td><button class='btn btn-success' type='submit' name='saveFilm' value=$id>Enregistrer</button>
                                            </form>
                                            <br>
                                            <br>
                                            <form method='post' action='adminRemoveFilm.php'>
                                            <button class='btn btn-danger' type='submit' name='removeFilm' value=$id>Supprimer</button>
                                            </form>
                                            </td>
                                            </tr>
                                        ";
                                    }
                                    else {
                                        echo "
                                            <tr id=$id>
                                            <td><img src='https://image.tmdb.org/t/p/w92/$poster_path' alt='$title'></td>
                                            <td>$id</td>
                                            <td>$title</td>
                                            <td>$original_title</td>
                                            <td>$genres</td>
                                            <td>$overview</td>
                                            <td>
                                            <form method='post' action='adminRemoveFilm.php#$id'>
                                            <button class='btn btn-primary' type='submit' name='updateFilm' value=$id>Changer</button>
                                            </form>
                                            <br>
                                            <form method='post' action='adminRemoveFilm.php'>
                                            <button class='btn btn-danger' type='submit' name='removeFilm' value=$id>Supprimer</button>
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
                <div class="row g-3" id='output'>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>