<?php
    include "../users/check-session.php";
?>        

<!DOCTYPE html>
<html lang="fr">
    <?php
        include "head.php";
    ?>        
    <body class="bg-dark text-white">
        <?php
            include "header.php";
        ?>
        <main class="container" id="film">
            <div class="card border border-dark rounded bg-dark mb-4">
                <?php
                    include "../connect-to-bdd.php"; // open database
                    if(isset($_GET['id'])) {  
                        $id= $_GET['id'];
                        $request = $bdd->query("SELECT * FROM films WHERE id LIKE $id"); //ir a buscar a la base de datos la pelicula de $id
                        $film = $request->fetch(); // guardamos el resultado en $film
                        $backdrop_path = $film['backdrop_path'];
                        $poster_path = $film['poster_path'];
                        $title = $film['title'];
                        $original_title = $film['original_title'];
                        $original_language = $film['original_language'];
                        $release_date = $film['release_date'];
                        $origin_country = $film['origin_country'];
                        $genres = $film['genres'];
                        $runtime = $film['runtime'];
                        $popularity = $film['popularity'];
                        $vote_count = $film['vote_count'];
                        $vote_average = $film['vote_average'];
                        $overview = $film['overview'];
                        $video = $film['video'];
                        $request->closeCursor();       
                        echo "
                            <div class='card-header text-center'>
                                <h2 class='card-title'>$title</h2>
                                <h3 class='card-title'>$original_title</h3>
                            </div>
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-12 col-md-3'>
                                        <img class='img-fluid border border-5 border-white' src='https://image.tmdb.org/t/p/w342/$poster_path' alt='$title'>
                                    </div>
                                    <div class='col-12 col-md-3'>
                                        <ul class='list-group'>
                                            <li class='list-group-item list-group-item-dark'>Genres: $genres</li>
                                            <li class='list-group-item list-group-item-dark'>Pays: <img src='https://www.countryflags.io/$origin_country/flat/32.png'></li>
                                            <li class='list-group-item list-group-item-dark'>Langue: $original_language</li>
                                            <li class='list-group-item list-group-item-dark'>Date: $release_date</li>
                                            <li class='list-group-item list-group-item-dark'>Durée: $runtime minutes</li>
                                            <li class='list-group-item list-group-item-dark'>Popularité: $popularity/10</li>
                                            <li class='list-group-item list-group-item-dark'>Rating: $vote_average</li>
                                        </ul>
                                    </div>
                                    <div class='col-12 col-md-6'>
                                        <h4>Synopsis</h4>
                                        <p class='p-3'>$overview</p>
                                        <div class='row'>
                        ";
                        if(isset($_SESSION['pseudo'])) {
                        echo "
                                            <div class='col-6 text-center'>
                                                <a href='play.php?id=$id' class='btn btn-success' type='button'>Play Film</a>
                                            </div>
                        ";
                        } else {
                            echo "
                                                <div class='col-6 text-center'>
                                                    <a href='/users/sign-in.php' class='btn btn-success' type='button'>S'inscrire</a>
                                                </div>
                            ";
                        }
                        echo "
                                            <div class='col-6 text-center'>
                                                <a href='search.php' class='btn btn-primary' type='button'>Back to search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                        include "comments.php";
                    }
                ?>
            </div>
        </main>
        <?php
            include "footer.php";
        ?>
        <?php
            include "script.php";
        ?>
    </body>
</html>