<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,700&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Info Card</title>
</head>

<body>
    <?php 
        //include("header.php");
    ?> 

    <main class>
    <?php
        include "connect-to-bdd.php"; // open database
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
                       
        }
        echo "
        <section class='container'>
            <div class='card border border-dark rounded text-white bg-dark mb-4'>
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
                                <li class='list-group-item text-white bg-dark'>Genres: $genres</li>
                                <li class='list-group-item text-white bg-dark'>Pays: $origin_country</li>
                                <li class='list-group-item text-white bg-dark'>Langue: $original_language</li>
                                <li class='list-group-item text-white bg-dark'>Date: $release_date</li>
                                <li class='list-group-item text-white bg-dark'>Durée: $runtime minutes</li>
                                <li class='list-group-item text-white bg-dark'>Popularité: $popularity/10</li>
                                <li class='list-group-item text-white bg-dark'>Rating: $vote_average</li>
                            </ul>
                        </div>
                        <div class='col-12 col-md-6'>
                            <h4>Synopsis</h4>
                            <p class='p-3'>$overview</p>
                            <div class='row'>
                                <div class='col-6 text-center'>
                                    <a href='$video' class='btn btn-success' type='button'>Play Film</a>
                                </div>
                                <div class='col-6 text-center'>
                                    <a href='mulasearch.php' class='btn btn-primary' type='button'>Back to search</a>
                                </div>
                            </div>
                        </div>
                        ";
                        ?>

                        <h1 class='fs-2 review-text p-5'>Critiques</h1>
                        <div id='reviews'></div>
                        

                            <?php
                            $request = $bdd->query("SELECT * FROM comments WHERE film_id = $id"); //ir a buscar a la base de datos la pelicula de $id
                            while($comment = $request->fetch()) {
                                $user_id = $comment['user_id'];
                                $text = $comment['text'];
                                $rec = $bdd->query("SELECT * FROM users WHERE id = $user_id");
                                $user = $rec->fetch();
                                $rec->closeCursor();
                                $avatar = $user['avatar'];
                                $pseudo = $user['pseudo'];

                                echo "
                                <div class='row'>
                                    <div class='col-md-2 text-center py-2'>
                                        <img class='rounded-circle' width='60px' src=$avatar alt=$pseudo>
                                    </div>
                                    <div class='col-md-10 border border-danger border-4'>
                                        <p class='fs-4'>Auteur: $pseudo</p>
                                        <div>
                                            <p style='color:silver;'>$text</p>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                             $request->closeCursor();
                             ?>
                            
                        
                    </div>
                </div>
            </div>            

        </section>
    
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>    
</body>
</html>