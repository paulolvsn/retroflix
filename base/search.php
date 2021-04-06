<!DOCTYPE html>
<html lang="fr">
    <?php
        include "head.php";
    ?>        
    <body class="bg-dark text-white">
        <?php
            include "header.php";
        ?>
        <main class="container" id="search">
            <section class="mb-3">
                <h3 class="h3">Rechercher...</h3>
                <div>
                    <form class="d-flex" action="search.php" method="get">
                        <input class="form-control me-2" type="search" name="keyword" placeholder="Recherche par Titre ou Genre..." aria-label="search">
                        <button class="btn btn-secondary" type="submit" name="search"><i class="fas fa-search"></i></button>
                    </form>
                </div>                
            </section>

            <?php                    
                include "../connect-to-bdd.php"; // open database
                if(isset($_GET['keyword'])) {  //al click en submit
                    $keyword= $_GET['keyword'];
                    $genre = $_GET['genre'];
                    $alpha = $_GET['alpha'];
                    echo "
                        <section class='container mb-3'>
                            <div class='row g-4'>
                    ";
                    if(($alpha) AND ($genre)) {
                        echo" <h5>Résultats pour<strong> '$keyword', genre: '$genre', en ordre alphabétique $alpha</strong></h5>";
                    }
                    else if($genre) {
                        echo" <h5>Résultats pour<strong> '$keyword', genre: '$genre'</strong></h5>";
                    }
                    else if($alpha) {
                        echo" <h5>Résultats pour<strong> '$keyword' en ordre alphabétique $alpha</strong></h5>";
                    }
                    else {
                        echo" <h5>Résultats pour<strong> '$keyword'</strong></h5>";
                    }
                    echo " 
                        <ul class='nav nav-tabs'>
                            <p class='navbar-brand'>Filtrez votre recherche:</p>                                    
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Genres</a>
                                <ul class='dropdown-menu'>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Action' id='action'>Action</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Animation' id='animation'>Animation</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Aventure' id='aventure'>Aventure</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Comédie' id='comedie'>Comédie</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Crime' id='crime'>Crime</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Documentaire' id='documentaire'>Documentaire</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Drame' id='drame'>Drame</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Fantastique' id='fantastique'>Fantastique</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Guerre' id='guerre'>Guerre</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Histoire' id='histoire'>Histoire</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Horreur' id='horreur'>Horreur</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Mystère' id='mystere'>Mystère</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Romance' id='romance'>Romance</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Science-Fiction' id='sciencefiction'>Science-Fiction</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Thriller' id='thriller'>Thriller</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='genre' value='Western' id='western'>Western</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='alpha' value=$alpha></form></li>
                                </ul>
                            </li>                                    
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Par ordre alphabétique</a>
                                <ul class='dropdown-menu'>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='alpha' value='ascendent' id='ascendent'>Ascendent (A-Z)</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='genre' value=$genre></form></li>
                                    <li><form action='search.php' method='get'><button class='dropdown-item btn btn-dark' type='submit' name='alpha' value='descendent' id='descendent'>Descendent (Z-A)</button><input type='hidden' name='keyword' value=$keyword><input type='hidden' name='genre' value=$genre></form></li>
                                </ul>
                            </li>
                    ";
                    
                    if(($alpha) AND ($genre)) {
                        if ($alpha == 'ascendent') {
                            $request = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) AND (genres LIKE '%$genre%') ORDER BY title");//ir a buscar a la base de datos "text"
                            $counter = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) AND (genres LIKE '%$genre%') ORDER BY title");//ir a buscar a la base de datos "text"
                        }
                        else {
                            $request = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) AND (genres LIKE '%$genre%') ORDER BY title DESC");//ir a buscar a la base de datos "text"
                            $counter = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) AND (genres LIKE '%$genre%') ORDER BY title DESC");//ir a buscar a la base de datos "text"
                        }
                    }
                    else if($genre) {
                        $request = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) AND (genres LIKE '%$genre%')");//ir a buscar a la base de datos "text"
                        $counter = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) AND (genres LIKE '%$genre%')");//ir a buscar a la base de datos "text"
                    }
                    else if($alpha) {
                        if ($alpha == 'ascendent') {
                            $request = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) ORDER BY title");//ir a buscar a la base de datos "text"
                            $counter = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) ORDER BY title");//ir a buscar a la base de datos "text"
                        }
                        else {
                            $request = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) ORDER BY title DESC");//ir a buscar a la base de datos "text"
                            $counter = $bdd->query("SELECT * FROM films WHERE ((title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%')) ORDER BY title DESC");//ir a buscar a la base de datos "text"
                        }
                    }
                    else {
                        $request = $bdd->query("SELECT * FROM films WHERE (title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%') ");//ir a buscar a la base de datos "text"
                        $counter = $bdd->query("SELECT * FROM films WHERE (title LIKE '%$keyword%') OR (original_title LIKE '%$keyword%') OR (genres LIKE '%$keyword%') ");//ir a buscar a la base de datos "text"
                    }
                    $total = 0;
                    while ($count = $counter->fetch()){
                        $total = $total + 1;
                    }
                    $counter->closeCursor();
                    echo "<p class='navbar-brand'>On a trouvé $total résultats.<p>";
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
                                    <div class='card-body text-center bg-dark'>
                                        <h4>$title</h4> 
                                    </div>    
                                    <div class='card-footer d-flex bg-dark'>
                                        <a class='link-light h3 col text-center' href='play.php?id=$id'><i class='fas fa-play-circle'></i></a>
                                        <a class='link-light h3 col text-center' href='film.php?id=$id'><i class='fas fa-chevron-down'></i></a>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                    $request->closeCursor();
                    echo "
                        </div> 
                    </section>
                    ";
                } 
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