<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Retroflix</title>
</head>
<body>
<header>
    <?php include 'header.php'; ?>
</header>
<main>
    <section class="container row m-5">
    <section class="col d-flex align-items-center m-5">
        <a class="text-decoration-none" href="lesdentsdelamer"><h1 class="display-1 text-uppercase"><b>LES DENTS DE LA MER</b></h1></a>
    </section>
    <section class="col" id="synopsis">
        <p>A quelques jours du début de la saison estivale, les habitants de la petite station balnéaire d'Amity sont mis en émoi par la découverte sur le littoral du corps atrocement mutilé d'une jeune vacancière. Pour Martin Brody, le chef de la police, il ne fait aucun doute que la jeune fille a été victime d'un requin. Il décide alors d'interdire l'accès des plages mais se heurte à l'hostilité du maire uniquement intéressé par l'afflux des touristes. Pendant ce temps, le requin continue à semer la terreur le long des côtes et à dévorer les baigneurs... (<b>Steve Spielberg</b>)</br>
        <i class="fas fa-play-circle" alt="Play button"></i>
    </section>
</section>

<h1 id="recommendations">RECOMMENDATIONS</h1>
    <section class="cardlist">
            <section class="cardlistcontainer">
            <?php
            
            try {
                $db = new PDO('mysql:host=database;dbname=retroflix;charset=utf8', 'root', 'root'); // open database
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

            $request = $db->query('SELECT * FROM films ORDER BY vote_average DESC LIMIT 0,8');
               while ($film = $request->fetch()) {
                $title = $film['title'];
                $poster_path = $film['poster_path'];
                echo "
                    <div class='cardlist-item'>
                        <img src='https://image.tmdb.org/t/p/w342/$poster_path' class='cardlist-itemimg' alt='$title'>
                        <div class='cardlist-itemdetails'>
                        <div class='cardbtn'>
                            <i class='fas fa-play-circle' alt='play button'></i>
                            <i class='fas fa-info-circle' alt='info button'></i>
                        </div>
                        <p class='cardtitle'>$title</p>
                    </div>
                    </div>
                    ";
            }
            ?>
        </section>
    </section>       
</main>
<footer>
<?php include 'footer.php' ?>
</footer>
</body>
</html>