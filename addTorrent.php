<div class="container">
    <div class="row">
        <h1>Add Torrent</h1>
        <table class="table table-bordered table-hover bg-white border border-dark text-start">
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