<div class="container-fluid" id='comments'>
    <h2 class='fs-2 p-5'>Commentaires</h2>
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
                <div class='col-12 col-md-2 text-center py-2'>
                    <img class='rounded-circle' width='60px' src='/$avatar' alt=$pseudo>
                </div>
                <div class='col-12 col-md-10'>
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