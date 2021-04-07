<?php
$request = $bdd->query("SELECT * FROM films WHERE genres LIKE '%$genre%' ORDER BY vote_average DESC LIMIT 0,8");
while ($film = $request->fetch()) {
    $id = $film['id'];
    $title = $film['title'];
    $poster_path = $film['poster_path'];
    echo "
    <div class='cardlist-item'>
        <img src='https://image.tmdb.org/t/p/w342/$poster_path' class='cardlist-itemimg' alt='$title'>
        <div class='cardlist-itemdetails'>
            <p>$title</p>
            <div class='cardbtn'>
    ";
    if(isset($_SESSION['pseudo'])) {
        echo "
                    <a href='/base/play.php?id=$id' class='link-light mx-1'><i class='fas fa-play-circle'></i></a>
        ";
    } else {
        echo "
                    <a href='/users/sign-in.php' class='link-light mx-1'><i class='fas fa-sign-in-alt'></i></a>
        ";
    }
    echo "
                <a href='/base/film.php?id=$id' class='link-light mx-1'><i class='fas fa-chevron-down'></i></a>
            </div>
        </div>
    </div>
    ";
}
?>