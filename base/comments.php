<div class="container-fluid" id='comments'>
    <h2 class='fs-2 p-5 text-warning'>COMMENTAIRES</h2>
    <?php
        if(isset($_POST['text'])) {
            $date = date("Y-m-d");
            $user_id = $_POST['addComment'];
            $film_id = $id;
            $text = $_POST['text'];
            $request = $bdd->prepare('INSERT INTO comments(date, user_id, film_id, text) VALUES(?, ?, ?, ?)'); //prepare add command
            $request->execute(array($date, $user_id, $film_id, $text)); // add new element in database
            echo "<h4 class='text-success'>Le commentaire a été ajouté à la base de données.</h4>";   
        }
        $request = $bdd->query("SELECT * FROM comments WHERE film_id = $id");
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
                    <img class='rounded-circle' width='60px' src='/users/$avatar' alt=$pseudo>
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
        if(isset($_SESSION['pseudo'])) {
            $pseudo = $_SESSION['pseudo'];
            $request = $bdd->query("SELECT * FROM users WHERE pseudo = '$pseudo' ");
            $user = $request->fetch();
            $request->closeCursor();
            $user_id = $user['id'];
            $avatar = $user['avatar'];

            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                $url = "https://";   
            else  
                $url = "http://";   
            // Append the host(domain name, ip) to the URL.   
            $url.= $_SERVER['HTTP_HOST'];   
            // Append the requested resource location to the URL   
            $url.= $_SERVER['REQUEST_URI'];
            echo "
            <div class='row'>
                <div class='col-12 col-md-2 text-center py-2'>
                    <img class='rounded-circle' width='60px' src='/users/$avatar' alt=$pseudo>
                </div>
                <div class='col-12 col-md-10'>
                    <form action='$url' method='post'>
                        <div class='form-group'>
                            <label class='fs-4' for='comment'>Auteur: $pseudo</label>
                            <textarea class='form-control' id='comment' name='text' rows='4' cols='50'></textarea>
                        </div>
                        <button type='submit' class='btn btn-dark my-1' name='addComment' value=$user_id>Submit</button>
                    </form>    
                </div>
            </div>
            ";
        }
    ?>
</div>