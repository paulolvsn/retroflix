<?php
    include "../users/check-session.php";
?>
<!DOCTYPE html>
<html lang="fr">
    <?php
        include "head.php";
    ?>        
    <body class="bg-dark text-white">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid px-5">
                    <a class="navbar-brand text-warning fs-3" href="/index.php">RETROFLIX</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/base/browse.php">BROWSE MOVIES</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mb-2 mb-lg-0 me-3">
                        <?php
                            if(isset($_SESSION['pseudo'])) {
                                echo "
                                <li class='nav-item'>
                                    <a class='nav-link text-white' aria-current='page' href='/users/account.php'><i class='fs-1 fas fa-user-circle'></i></i></a>
                                </li>
                                ";
                            }
                        ?>
                        <?php
                            if(!isset($_SESSION['pseudo'])) {
                                echo "
                                    <li class='nav-item'>
                                        <a class='nav-link text-white' aria-current='page' href='/users/create-account.php'><i class='fs-5 fas fa-user-plus'></i></a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link text-white' aria-current='page' href='/users/sign-in.php'><i class='fs-5 fas fa-sign-in-alt'></i></a>
                                    </li>
                                ";
                            }
                        ?>
                        <?php
                            if(isset($_SESSION['pseudo'])) {
                                echo "
                                <li class='nav-item'>
                                    <a class='nav-link text-white' aria-current='page' href='/users/deconnexion.php'><i class='fs-5 fas fa-sign-out-alt'></i></a>
                                </li>
                                ";
                            }
                        ?>
                        </ul>        
                    </div>
                </div>
            </nav>
        </header>
        <main class="container" id="search">
            <section class="row mb-3">
                <div class="col mx-0 p-0">
                    <form class="d-flex" action="search.php" method="get">
                        <input class="form-control rounded-pill me-2" type="search" name="keyword" placeholder="Recherche par Titre ou Genre..." aria-label="search">
                        <button class="btn btn-secondary rounded-pill" type="submit" name="search"><i class="fas fa-search"></i></button>
                    </form>
                </div>                
            </section>
            <?php                    
                include "../users/connect-to-bdd.php"; // open database
                if(isset($_GET['keyword'])) {
                    $keyword= $_GET['keyword'];
                    if(isset($_GET['genre'])){
                        $genre = $_GET['genre'];
                    } else {
                        $genre = NULL;
                    }
                    if(isset($_GET['alpha'])){
                        $alpha = $_GET['alpha'];
                    } else {
                        $alpha = NULL;
                    }
                    echo "
                        <section class='row g-4 my-3'>
                    ";
                    if(($alpha) AND ($genre)) {
                        echo "<h5 class='m-0 p-0'>Résultats pour<strong> '$keyword', genre: '$genre', en ordre alphabétique $alpha</strong></h5>";
                    }
                    else if($genre) {
                        echo "<h5 class='m-0 p-0'>Résultats pour<strong> '$keyword', genre: '$genre'</strong></h5>";
                    }
                    else if($alpha) {
                        echo "<h5 class='m-0 p-0'>Résultats pour<strong> '$keyword' en ordre alphabétique $alpha</strong></h5>";
                    }
                    else if($keyword){
                        echo "<h5 class='m-0 p-0'>Résultats pour<strong> '$keyword'</strong></h5>";
                    }
                    echo " 
                        <ul class='nav nav-tabs mt-0'>
                            <p class='navbar-brand text-warning'>Filtrez votre recherche:</p>
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle text-warning' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Genres</a>
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
                                <a class='nav-link dropdown-toggle text-warning' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Par ordre alphabétique</a>
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
                    echo "<p class='navbar-brand text-warning'>On a trouvé $total résultats.<p>";
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
                        list($year, $rest) = explode("-", $release_date);
                        echo "
                            <div class='col-12 col-sm-4 col-md-3'>
                                <div class='card h-100 border border-5 border-white rounded'>
                                <a href='film.php?id=$id'><img class='card-img-top' src='https://image.tmdb.org/t/p/w342/$poster_path' alt='$title'></a>
                                    <div class='card-body text-center bg-dark'>
                                        <h4 class='text-warning'>$title</h4>
                                        <h4 class='text-warning'>($year)</h4>
                                    </div>    
                                    <div class='card-footer bg-dark text-center'>
                                        <ul class='list-inline list-unstyled'>
                        ";
                        if(isset($_SESSION['pseudo'])) {
                            echo "
                                            <li class='list-inline-item'><a href='play.php?id=$id' class='link-light h5 mx-3'><i class='fas fa-play-circle'></i></a></li>
                            ";
                        } else {
                            echo "
                                            <li class='list-inline-item'><a href='/users/sign-in.php' class='link-light h5 mx-3'><i class='fas fa-sign-in-alt'></i></a></li>
                            ";
                        }
                        echo "
                                            <li class='list-inline-item'><a href='film.php?id=$id' class='link-light h5 mx-3'><i class='fas fa-chevron-down'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                    $request->closeCursor();
                    echo "
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