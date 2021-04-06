<!DOCTYPE html>
<html lang="fr">
    <?php
        include "base/head.php";
    ?>
    <body class="bg-dark text-white">
        <?php
            include "base/header.php";
        ?>  
        <main class="container">
            <section class="container row m-5">
                <section class="col d-flex align-items-center m-5">
                    <a class="text-decoration-none" href="lesdentsdelamer"><h1 class="display-1 text-uppercase">LES DENTS DE LA MER</h1></a>
                </section>
                <section class="col" id="synopsis">
                    <p>À quelques jours du début de la saison estivale, les habitants de la petite station balnéaire d'Amity sont mis en émoi par la découverte sur le littoral du corps atrocement mutilé d'une jeune vacancière. Pour Martin Brody, le chef de la police, il ne fait aucun doute que la jeune fille a été victime d'un requin. Il décide alors d'interdire l'accès des plages mais se heurte à l'hostilité du maire uniquement intéressé par l'afflux des touristes. Pendant ce temps, le requin continue à semer la terreur le long des côtes et à dévorer les baigneurs... (<b>Steven Spielberg</b>)</br>
                    <a href='/base/play.php?id=$id' class='link-light mx-1'><i class='fas fa-play-circle'></i></a>
                    <a href='/base/film.php?id=$id' class='link-light mx-1'><i class='fas fa-chevron-down'></i></a>
                </section>
            </section>

            <section class="cardlist">
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