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
        
        <title>Play</title>
    </head>
    <body>
        <main class="container">
            <?php
                include "connect-to-bdd.php"; // open database
                if(isset($_GET['id'])) { 
                    $id = $_GET['id'];
                    $request = $bdd->query("SELECT * FROM films WHERE id=$id"); // search info for id=$id
                    $film = $request->fetch(); // get result
                    list($youtube, $video) = explode("watch?v=", $film['video']);
                    // list($youtube, $video) = explode("watch?", $video);
                    // list($youtube, $video) = explode("feature=", $video);
                    // list($youtube, $video) = explode("&v=", $video);
                    // list($video, $rest) = explode("&NR=1", $video);
                    echo "$youtube <br>";
                    echo "$video <br>";

                    echo "
                        <iframe width='100%' height='100%' src='https://www.youtube.com/embed/$video' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                    ";
                    $request->closeCursor();
                }
            ?>            
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>