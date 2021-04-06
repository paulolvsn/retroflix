<!DOCTYPE html>
<html lang="fr">
    <?php
        include "head.php";
    ?>        
    <body class="bg-dark text-white">
        <?php
            include "header.php";
        ?>
        <main class="container" id="browse">
            <?php                    
                include "../connect-to-bdd.php"; // open database
                    echo "
                        <section class='container mb-5'>
                            <div class='row g-4'>
                                <ul class='nav nav-tabs'>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Genres</a>
                                        <ul class='dropdown-menu'>
                                            <li><a class='dropdown-item' href='#'>Action</a></li>
                                            <li><a class='dropdown-item' href='#'>Another action</a></li>
                                        </ul>
                                    </li>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Pays</a>
                                        <ul class='dropdown-menu'>
                                            <li><a class='dropdown-item' href='#'>Action</a></li>
                                            <li><a class='dropdown-item' href='#'>Another action</a></li>
                                        </ul>
                                    </li>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Dropdown</a>
                                        <ul class='dropdown-menu'>
                                            <li><a class='dropdown-item' href='#'>Action</a></li>
                                            <li><a class='dropdown-item' href='#'>Another action</a></li>
                                        </ul>
                                    </li>
                                    </ul>
                    ";  
                    $request = $bdd->query("SELECT * FROM films");
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
                    </section>
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