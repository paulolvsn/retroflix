<!DOCTYPE html>
<html lang="fr">
    <?php
        include "head.php";
    ?>        
    <body class="bg-dark text-white">
        <?php
            include "header.php";
        ?>
        <main class="container mb-3" id="browse">
            <?php                    
                include "../connect-to-bdd.php"; // open database
                $genre = $_GET['genre'];
                $alpha = $_GET['alpha'];
                if(($alpha) AND ($genre)) {
                    echo "<h5>Films du genre <strong>'$genre'</strong> en ordre alphabétique $alpha</h5>";
                }
                else if($genre) {
                    echo "<h5>Films du genre <strong>'$genre'</strong></h5>";
                }
                else if($alpha) {
                    echo "<h5>Films en ordre alphabétique $alpha</strong></h5>";
                }
                else {
                    echo "<h5>Toutes les films</h5>";
                }
                echo "
                    <div class='row g-4'>
                        <ul class='nav nav-tabs'>
                            <p class='navbar-brand'>Filtrez votre recherche:</p>                                    
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle text-white' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Genres</a>
                                <ul class='dropdown-menu'>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Action' id='action'>Action</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Animation' id='animation'>Animation</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Aventure' id='aventure'>Aventure</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Comédie' id='comedie'>Comédie</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Crime' id='crime'>Crime</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Documentaire' id='documentaire'>Documentaire</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Drame' id='drame'>Drame</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Fantastique' id='fantastique'>Fantastique</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Guerre' id='guerre'>Guerre</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Histoire' id='histoire'>Histoire</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Horreur' id='horreur'>Horreur</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Mystère' id='mystere'>Mystère</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Romance' id='romance'>Romance</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Science-Fiction' id='sciencefiction'>Science-Fiction</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Thriller' id='thriller'>Thriller</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Western' id='western'>Western</button><input type='hidden' name='alpha' value=$alpha></form></li>
                                </ul>
                            </li>                                    
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle text-white' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Par ordre alphabétique</a>
                                <ul class='dropdown-menu'>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='alpha' value='ascendent' id='ascendent'>Ascendent (A-Z)</button><input type='hidden' name='genre' value=$genre></form></li>
                                    <li><form action='browse.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='alpha' value='descendent' id='descendent'>Descendent (Z-A)</button><input type='hidden' name='genre' value=$genre></form></li>
                                </ul>
                            </li>
                ";
                if(($alpha) AND ($genre)) {
                    if ($alpha == 'ascendent') {
                        $request = $bdd->query(" SELECT * FROM films WHERE genres LIKE '%$genre%' ORDER BY title ");
                        $counter = $bdd->query(" SELECT * FROM films WHERE genres LIKE '%$genre%' ORDER BY title ");
                    }
                    else {
                        $request = $bdd->query(" SELECT * FROM films WHERE genres LIKE '%$genre%' ORDER BY title DESC ");
                        $counter = $bdd->query(" SELECT * FROM films WHERE genres LIKE '%$genre%' ORDER BY title DESC ");
                    }
                }
                else if($genre) {
                    $request = $bdd->query(" SELECT * FROM films WHERE genres LIKE '%$genre%' ");
                    $counter = $bdd->query(" SELECT * FROM films WHERE genres LIKE '%$genre%' ");
                }
                else if($alpha) {
                    if ($alpha == 'ascendent') {
                        $request = $bdd->query(" SELECT * FROM films ORDER BY title ");
                        $counter = $bdd->query(" SELECT * FROM films ORDER BY title ");
                    }
                    else {
                        $request = $bdd->query(" SELECT * FROM films ORDER BY title DESC ");
                        $counter = $bdd->query(" SELECT * FROM films ORDER BY title DESC ");
                    }
                }
                else {
                    $request = $bdd->query(" SELECT * FROM films ");//ir a buscar a la base de datos "text"
                    $counter = $bdd->query(" SELECT * FROM films ");//ir a buscar a la base de datos "text"
                }
                $total = 0;
                while ($count = $counter->fetch()){
                    $total = $total + 1;
                }
                $counter->closeCursor();
                echo "<p class='navbar-brand'>On a $total films.<p>";
                echo "</ul>";
                while ($film = $request->fetch()){
                    $id = $film['id'];
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
                    echo "
                        <div class='col-12 col-sm-4 col-md-3 '>
                            <div class='card h-100 border rounded'>
                                <img class='card-img-top' src='https://image.tmdb.org/t/p/w342/$poster_path' alt='$title'>
                                <div class='card-body text-center text-white bg-dark'>
                                    <h4>$title</h4> 
                                </div>    
                                <div class='card-footer bg-dark text-center'>
                                    <ul class='list-inline list-unstyled'>
                                        <li class='list-inline-item'><a href='play.php?id=$id' class='link-light h5 mx-3'><i class='fas fa-play-circle'></i></a> </li>
                                        <li class='list-inline-item'><a href='film.php?id=$id' class='link-light h5 mx-3'><i class='fas fa-chevron-down'></i></a></li>
                                    </ul>                      
                                </div>
                            </div>
                        </div>
                    ";
                    
                }
                $request->closeCursor();
                echo "
                    </div>
                ";
            ?>            
        </main>
        <?php
            include "footer.php";
        ?>
        <?php
            include "script.php";
        ?>
    </body>
</html>