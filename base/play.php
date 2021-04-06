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
            <div class="ratio ratio-16x9 m-5">
                <?php
                    include "../connect-to-bdd.php"; // open database
                    if(isset($_GET['id'])) { 
                        $id = $_GET['id'];
                        $request = $bdd->query("SELECT * FROM films WHERE id=$id"); // search info for id=$id
                        $film = $request->fetch(); // get result
                        $title = $film['title'];
                        $video = $film['video'];
                        echo "
                            <iframe src='https://www.youtube.com/embed/$video' title='$title' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                        ";
                        $request->closeCursor();
                    }
                ?>
            </div>
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