<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Torrent</title>
        <meta name="viewport" content="width=device-width">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital,wght@1,700&display=swap" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row">
                    <h1>Add Torrent</h1>
                    <table class="table bg-white table-hover border border-dark text-start">
                        <thead>
                            <tr>
                                <th scope="col">Poster</th>
                                <th scope="col">IMDB ID</th>
                                <th scope="col">Titre original</th>
                                <th scope="col">Torrent</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "connect-to-bdd.php"; // open database         
                                // IF save button is clicked
                                if(isset($_POST['addTorrent'])) {
                                    echo "<script type='text/javascript'>function toggleAddTorrent(){addTorrent.classList.add('active');manageFilms.classList.remove('active');btnAddTorrent.classList.add('active');btnManageFilms.classList.remove('active');}toggleAddTorrent();</script>";
                                    $imdb_id = $_POST['addTorrent'];
                                    $torrent = $_POST['torrent'];
                                    $request = $bdd->prepare('UPDATE films SET torrent = ? WHERE imdb_id = ?'); //prepare add command
                                    $request->execute(array($torrent, $imdb_id)); // add new element in database
                                    echo "<h4 class='text-success'>Torrent added to database.</h4>";   
                                }
                                // generate film list table
                                $request = $bdd->query('SELECT * FROM films');
                                while ($film = $request->fetch()) {
                                    $poster_path = $film['poster_path'];
                                    $imdb_id = $film['imdb_id'];
                                    $title = $film['title'];
                                    $torrent = $film['torrent'];
                                    include "key.php"; // load API key
                                    $baseURL = "https://yts.mx/api/v2/";
                                    $url = $baseURL . "list_movies.json?query_term=" . $imdb_id;
                                    if( isset($_POST['updateTorrent']) AND ($film['imdb_id'] == $_POST['updateTorrent'])) {
                                        echo "<script type='text/javascript'>function toggleAddTorrent(){addTorrent.classList.add('active');manageFilms.classList.remove('active');btnAddTorrent.classList.add('active');btnManageFilms.classList.remove('active');}toggleAddTorrent();</script>";
                                        echo "
                                            <tr id=$imdb_id>
                                            <td><img src='https://image.tmdb.org/t/p/w92/$poster_path' alt='$title'></td>
                                            <td>$imdb_id</td>
                                            <td>$title</td>
                                            <td>
                                            <form method='post' action='adminPanel.php' id='form'>
                                            <script>
                                            console.log('$url');
                                            let url = '$url';
                                            fetch(url)
                                            .then(result=>result.json())
                                            .then((data)=>{
                                                text = JSON.stringify(data, null, 4);
                                                film = JSON.parse(text).data.movies[0];
                                                console.log(film);

                                                var selectTorrent = document.createElement('P');
                                                selectTorrent.innerHTML = 'Please choose the torrent you want to add:';

                                                var form = document.getElementById('form');
                                                form.appendChild(selectTorrent);

                                                film.torrents.forEach(function(torrent, index) {
                                                    var torrents = [];
                                                    torrents[index] = document.createElement('INPUT');
                                                    torrents[index].type = 'radio';
                                                    torrents[index].name = 'torrent';
                                                    torrents[index].id = index;
                                                    torrents[index].value = torrent.url;
                                                    var labels = [];
                                                    labels[index] = document.createElement('LABEL');
                                                    labels[index].for = index;
                                                    labels[index].innerHTML = torrent.quality + ' ' + torrent.size;
                                                    var br = [];
                                                    br[index] = document.createElement('BR');
                                                    form.appendChild(torrents[index]);
                                                    form.appendChild(labels[index]);
                                                    form.appendChild(br[index]);
                                                });                                            
                                            })
                                            </script>
                                            </td>
                                            <td><button class='btn btn-sm btn-success' type='submit' name='addTorrent' value=$imdb_id>Enregistrer</button>
                                            </form>
                                            </td>
                                            </tr>
                                        ";
                                    }
                                    else {
                                        echo "
                                            <tr id=$imdb_id>
                                            <td><img src='https://image.tmdb.org/t/p/w92/$poster_path' alt='$title'></td>
                                            <td>$imdb_id</td>
                                            <td>$title</td>
                                            <td><span class='text-break'>$torrent</span></td>
                                            <td>
                                            <form method='post' action='adminPanel.php#$imdb_id'>
                                            <button class='btn btn-sm btn-primary' type='submit' name='updateTorrent' value=$imdb_id>Changer</button>
                                            </form>
                                            </td>
                                            </tr>
                                        ";
                                    }
                                }
                                $request->closeCursor(); // close database
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>