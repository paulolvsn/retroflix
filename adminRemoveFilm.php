<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel: Remove Film</title>
        <meta name="viewport" content="width=device-width">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row">
                    <h1>Admin Panel : Remove Film</h1>
                    <table class="table bg-white table-hover border border-dark text-start">
                        <thead>
                            <tr>
                                <th scope="col">Poster</th>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Overview</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                try {
                                    $db = new PDO('mysql:host=database;dbname=retroflix;charset=utf8', 'root', 'root'); // open database
                                } catch (Exception $e) {
                                    die('Erreur : ' . $e->getMessage());
                                }
                                // IF delete button is clicked
                                if(isset($_POST['removeFilm'])) {
                                    $id = $_POST['removeFilm'];
                                    $request = $db->prepare('DELETE FROM films WHERE id = ?'); //prepare delete command
                                    $request->execute(array($id)); // delete film from database
                                    echo "<h4>Film removed from database.</h4>";   
                                }
                                $request = $db->query('SELECT * FROM films');
                                        while ($film = $request->fetch()) {
                                            $poster_path = $film['poster_path'];
                                            $id = $film['id'];
                                            $title = $film['title'];
                                            $overview = $film['overview'];
                                            echo "<tr>";
                                            echo "<td><img src='https://image.tmdb.org/t/p/w92/$poster_path' alt='$title'></td>";
                                            echo "<td>$id</td>";
                                            echo "<td>$title</td>";
                                            echo "<td>$overview</td>";
                                            echo "<td><form method='post' action='adminRemoveFilm.php'><button type='submit' name='removeFilm' value=$id class='btn-danger'>x</button></form></td>";
                                            echo "</tr>";
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