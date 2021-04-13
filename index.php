<?php
    include "users/check-session.php";
?>

<!DOCTYPE html>
<html lang="fr">
    <?php
        include "base/head.php";
    ?>
    <body class="bg-dark text-white m-0 p-0">
        <?php
            include "base/header.php";
        ?>  
        <main class="container-fluid m-0 p-0">
            <?php
                include "users/connect-to-bdd.php";
                $request = $bdd->query("SELECT * FROM films");
                while ($film = $request->fetch()){
                    $films[] = $film['id'];
                    $titles[] = $film['title'];
                    $overviews[] = $film['overview'];
                    $backdrop_paths[] = $film['backdrop_path'];
                }
                $request->closeCursor();
                $length = count($films) - 1;
                $random = rand(0, $length);
                $id = $films[$random];
                $title = $titles[$random];
                $overview = $overviews[$random];
                $backdrop_path = "https://image.tmdb.org/t/p/original/" . $backdrop_paths[$random];
            echo "
                <section class='row' id='banner'>
                    <div style='position:absolute;top:0;left:0;width:100%;height:100%;background:url($backdrop_path);background-repeat:no-repeat;background-position:center;background-size:cover;opacity:0.2;z-index:-1;'>
                    </div>
                    <div class='row h-100'>
                        <div class='col-12 col-md-6 d-flex align-items-center p-4'>
                            <h1 class='display-1 text-uppercase'><a class='text-decoration-none text-warning' href='/base/film.php?id=$id'>$title</a></h1>
                        </div>
                        <div class='col-12 col-md-6 d-flex flex-column align-self-center p-4 text-white'>
                            <p>$overview</p>
                            <div class='text-center'>
            ";
            if(isset($_SESSION['pseudo'])) {
                echo "
                                <a href='/base/play.php?id=$id' class='link-light px-3'><i class='fs-3 fas fa-play-circle'></i></a>
                ";
            } else {
                echo "
                                <a href='/users/sign-in.php' class='link-light px-3'><i class='fs-3 fas fa-sign-in-alt'></i></a>
                ";
            }
            echo "
                                <a href='/base/film.php?id=$id' class='link-light px-3'><i class='fs-3 fas fa-chevron-down'></i></a>
                            </div>
                        </div>
                    </div>
                </section>
            ";
            ?>
            <section class="container-fluid cardlist" id="carousels">
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="rating">Best rating</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $sort = 'vote_average';
                        include "base/carousel.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="popularity">Most popular</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $sort = 'popularity';
                        include "base/carousel.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="voted">Most voted</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $sort = 'vote_count';
                        include "base/carousel.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="action">Action</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Action';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="animation">Animation</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Animation';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="aventure">Aventure</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Aventure';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="comedie">Comédie</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Comédie';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="crime">Crime</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Crime';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="documentaire">Documentaire</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Documentaire';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="drame">Drame</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Drame';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="fantastique">Fantastique</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Fantastique';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="guerre">Guerre</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Guerre';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="histoire">Histoire</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Histoire';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="horreur">Horreur</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Horreur';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="mystere">Mystère</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Mystère';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="romance">Romance</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Romance';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="sciencefiction">Science-Fiction</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Science-Fiction';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="thriller">Thriller</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Thriller';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 class="mb-5" id="western">Western</h2>
                    <?php
                        include "users/connect-to-bdd.php";
                        $genre = 'Western';
                        include "base/carousel-genres.php";
                    ?>
                </div>
            </section>
        </main>
        <?php
            include "base/footer.php";
        ?>  
        <?php
            include "base/script.php";
        ?>    
    </body>
</html>