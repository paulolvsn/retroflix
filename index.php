<!DOCTYPE html>
<html lang="fr">
    <?php
        include "base/head.php";
    ?>
    <body class="bg-dark text-white">
        <?php
            include "base/header.php";
        ?>  
        <main class="container-fluid">
            <?php
                include "connect-to-bdd.php";
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
                <section class='row my-5' style='height:75vh;width:75vw;margin:auto;'>
                    <div class='card'>
                        <img class='card-img-top' src='$backdrop_path' alt='$title' style='opacity:0.3;'>
                        <div class='card-img-overlay'>
                            <div class='row h-100'>
                                <div class='col d-flex align-items-center p-5'>
                                    <h1 class='display-1 text-uppercase'><a class='text-decoration-none text-warning' href='/base/film.php?id=$id'>$title</a></h1>
                                </div>
                                <div class='col d-flex flex-column align-self-center p-5'>
                                    <p class='text-body'>$overview</p><br>
                                    <div class='text-center'>
                                        <a href='/base/play.php?id=$id' class='link-light mx-3'><i class='text-body fs-3 fas fa-play-circle'></i></a>
                                        <a href='/base/film.php?id=$id' class='link-light mx-3'><i class='text-body fs-3 fas fa-chevron-down'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            ";
            ?>
            <section class="container cardlist">
                <div class="cardlistcontainer">
                    <h2 id="rating">Best rating</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $sort = 'vote_average';
                        include "base/carousel.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="popularity">Most popular</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $sort = 'popularity';
                        include "base/carousel.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="voted">Most voted</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $sort = 'vote_count';
                        include "base/carousel.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="action">Action</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Action';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="animation">Animation</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Animation';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="aventure">Aventure</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Aventure';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="comedie">Comédie</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Comédie';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="crime">Crime</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Crime';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="documentaire">Documentaire</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Documentaire';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="drame">Drame</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Drame';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="fantastique">Fantastique</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Fantastique';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="guerre">Guerre</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Guerre';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="histoire">Histoire</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Histoire';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="horreur">Horreur</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Horreur';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="mystere">Mystère</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Mystère';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="romance">Romance</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Romance';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="sciencefiction">Science-Fiction</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Science-Fiction';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="thriller">Thriller</h2>
                    <?php
                        include "connect-to-bdd.php";
                        $genre = 'Thriller';
                        include "base/carousel-genres.php";
                    ?>
                </div>
                <div class="cardlistcontainer">
                    <h2 id="western">Western</h2>
                    <?php
                        include "connect-to-bdd.php";
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