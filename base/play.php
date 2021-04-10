<?php
    include "../users/check-session.php";
?>   

<!DOCTYPE html>
<html lang="fr">
    <?php
        include "head.php";
    ?>        
    <body class="bg-dark text-white">
        <?php
            include "header.php";
        ?>
        <main class="container" id="play">
                <?php
                    include "../users/connect-to-bdd.php"; // open database
                    if(isset($_GET['id'])) { 
                        $id = $_GET['id'];
                        $request = $bdd->query("SELECT * FROM films WHERE id=$id"); // search info for id=$id
                        $film = $request->fetch(); // get result
                        $title = $film['title'];
                        $original_title = $film['original_title'];
                        $release_date = $film['release_date'];
                        $video = $film['video'];
                        $overview = $film['overview'];
                        list($year, $rest) = explode("-", $release_date);
                        echo "
                            <div class='container'>
                                <h2 class='text-warning'>$title</h2>
                                <h3 class='text-white'><i>$original_title ($year)</i></h3>
                            </div>
                            <div class='ratio ratio-16x9 m-3'>
                                <iframe src='https://www.youtube.com/embed/$video' title='$title' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            </div>
                            <div class='container'>
                                <h2 class='text-warning'>SYNOPSIS</h2>
                                <p>$overview</p>
                            </div>
                        ";
                        $request->closeCursor();
                    }
                ?>
            <?php
                include "comments.php"
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