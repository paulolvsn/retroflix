<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Using TheMovieDB</title>
    <meta name="viewport" content="width=device-width">
    <!-- API version 3 documentation: 
        https://developers.themoviedb.org/3/search
        https://developers.themoviedb.org/3/movies
    -->
</head>
<body>
    <h1>Add Films to Database</h1>
    <h2>Search film:</h2>
    <form method="post" action="torrent.php">
        <input type="text" name="keyword" placeholder="Keyword" required>
        <button type="submit" name="searchFilm">Search</button>
    </form>
    <?php
        // load API key
        include "key.php";
        // IF search button is clicked
        if (isset($_POST['searchFilm'])) {
            $keyword = $_POST['keyword'];
            $baseURL = "https://yts.mx/api/v2/";
            $url = $baseURL . "list_movies.json?query_term=" . $keyword;
            echo "API query: $url<br>";
            echo "<strong>Showing results for $keyword:</strong><br>";
            echo "
                <script>
                let url = '$url';
                fetch(url)
                .then(result=>result.json())
                .then((data)=>{
                    text = JSON.stringify(data, null, 4);
                    results = JSON.parse(text);
                    console.log(results.data.movies);
                    results.data.movies.forEach(function(film) {
                        
                        var br = document.createElement('BR');

                        var btn = document.createElement('BUTTON');
                        btn.innerHTML = 'Add ' + film.title_english + ' to database';
                        btn.type = 'submit';
                        btn.name = 'addFilm';
                        btn.value = film.id;

                        var input = document.createElement('INPUT');
                        input.type = 'hidden';
                        input.name = 'name';
                        input.value = film.title_english;

                        var img = document.createElement('IMG');
                        img.src = film.medium_cover_image;

                        var form = document.createElement('FORM');
                        form.action = 'torrent.php';
                        form.method = 'post';
                        form.appendChild(btn);
                        form.appendChild(input);

                        var div = document.createElement('DIV');
                        div.style.display = 'flex';
                        div.style.justifyContent = 'left';
                        div.style.width = '100%';
                        div.style.margin = 'auto';
                        div.style.padding = '5px';
                        div.appendChild(img);
                        div.appendChild(form);
                        div.appendChild(br);

                        document.getElementById('output').appendChild(div);
                    });   
                })
                </script>";
        }
        // IF add film button clicked
        if(isset($_POST['addFilm'])) {
            $id = $_POST['addFilm'];
            $name = $_POST['name'];
            $baseURL = "https://yts.mx/api/v2/";
            $url = $baseURL . "movie_details.json?movie_id=" . $id;

            //$imdbId = $_POST['searchFilm'];
            //$baseURL = "https://api.themoviedb.org/3/";
            //$url = $baseURL . "find/" . $imdbId ."?api_key=" . $APIKEY . "&language=fr-FR&external_source=imdb_id";
            echo "API query: $url<br>";
            echo "<strong>Showing info for $name (ID: $id):</strong><br>";
            echo "
                <script>
                let url = '$url';
                fetch(url)
                .then(result=>result.json())
                .then((data)=>{
                    text = JSON.stringify(data, null, 4);
                    film = JSON.parse(text).data.movie;
                    console.log(film);
                    
                    var br00 = document.createElement('BR');
                    var br01 = document.createElement('BR');
                    var br02 = document.createElement('BR');
                    var br03 = document.createElement('BR');

                    var btn = document.createElement('BUTTON');
                    btn.innerHTML = 'Confirm';
                    btn.type = 'submit';
                    btn.name = 'confirm';
                    btn.value = film.id;

                    var original_title = document.createElement('INPUT');
                    original_title.type = 'text';
                    original_title.name = 'original_title';
                    original_title.value = film.title_english;

                    var selectTorrent = document.createElement('P');
                    selectTorrent.innerHTML = 'Please choose the torrent you want to add:';

                    var form = document.createElement('FORM');
                    form.action = 'torrent.php';
                    form.method = 'post';
                    form.appendChild(original_title);
                    form.appendChild(br01);
                    form.appendChild(selectTorrent);
                    form.appendChild(br02);
                    film.torrents.forEach(function(torrent, index) {
                        var torrents = [];
                        torrents[index] = document.createElement('INPUT');
                        torrents[index].type = 'radio';
                        torrents[index].name = 'torrent';
                        torrents[index].id = index;
                        torrents[index].value = torrent.url;
                        var labels = [];
                        labels[index] = document.createElement('LABEL');
                        labels[index].innerHTML = torrent.quality + ' ' + torrent.size + ' ' +torrent.url;
                        labels[index].for = index;
                        var br = [];
                        br[index] = document.createElement('BR');
                        form.appendChild(torrents[index]);
                        form.appendChild(labels[index]);
                        form.appendChild(br[index]);
                    });
                    form.appendChild(br03);
                    form.appendChild(btn);

                    document.getElementById('output').appendChild(form);
                    document.getElementById('output').style.display = 'flex';
                    document.getElementById('output').style.flexDirection = 'column';

                })

                
                </script>";
        }
        if(isset($_POST['confirm'])) {
            try {
                $db = new PDO('mysql:host=database;dbname=retroflix;charset=utf8', 'root', 'root'); // open database
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }            
            $original_title = $_POST['original_title'];
            $torrent = $_POST['torrent'];
            $request = $db->prepare("UPDATE films SET torrent = ? WHERE original_title = '$original_title'"); //prepare add command
            $request->execute(array($torrent)); // add new element in database
            echo "<h4>Torrent added to database.</h4>";   
        }
    ?>
    <!-- <p><img src="https://image.tmdb.org/t/p/w185/s2xcqSFfT6F7ZXHxowjxfG0yisT.jpg" alt="Jaws"/></p> -->
    <!-- <p><img src="https://image.tmdb.org/t/p/w185/3nYlM34QhzdtAvWRV5bN4nLtnTc.jpg" alt="Jaws"/></p> -->
    <div id='output'></div>
</body>
</html>