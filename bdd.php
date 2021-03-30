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
    <form method="post" action="bdd.php">
        <input type="text" name="keyword" placeholder="Keyword" required>
        <button type="submit" name="searchFilm">Search</button>
    </form>
    <?php
        // load API key
        include "key.php";
        // IF search button is clicked
        if (isset($_POST['searchFilm'])) {
            $keyword = $_POST['keyword'];
            $baseURL = "https://api.themoviedb.org/3/";
            $url = $baseURL . "search/movie?api_key=" . $APIKEY . "&query=" . $keyword . "&language=fr-FR";
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
                    console.log(results.results);
                    results.results.forEach(function(film) {
                        
                        var br = document.createElement('BR');

                        var btn = document.createElement('BUTTON');
                        btn.innerHTML = 'Add ' + film.title + ' to database';
                        btn.type = 'submit';
                        btn.name = 'addFilm';
                        btn.value = film.id;

                        var input = document.createElement('INPUT');
                        input.type = 'hidden';
                        input.name = 'name';
                        input.value = film.original_title;

                        var img = document.createElement('IMG');
                        img.src = 'https://image.tmdb.org/t/p/w92/'+film.poster_path;

                        var form = document.createElement('FORM');
                        form.action = 'bdd.php';
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
            $baseURL = "https://api.themoviedb.org/3/";
            $url = $baseURL . "movie/$id?api_key=" . $APIKEY . "&language=fr-FR";
            echo "API query: $url<br>";
            echo "<strong>Showing info for $name (ID: $id):</strong><br>";
            echo "
                <script>
                let url = '$url';
                fetch(url)
                .then(result=>result.json())
                .then((data)=>{
                    text = JSON.stringify(data, null, 4);
                    film = JSON.parse(text);
                    console.log(film);
                    
                    var br00 = document.createElement('BR');
                    var br01 = document.createElement('BR');
                    var br02 = document.createElement('BR');
                    var br03 = document.createElement('BR');
                    var br04 = document.createElement('BR');
                    var br05 = document.createElement('BR');
                    var br06 = document.createElement('BR');
                    var br07 = document.createElement('BR');
                    var br08 = document.createElement('BR');
                    var br09 = document.createElement('BR');
                    var br10 = document.createElement('BR');
                    var br11 = document.createElement('BR');
                    var br12 = document.createElement('BR');
                    var br13 = document.createElement('BR');
                    var br14 = document.createElement('BR');

                    var btn = document.createElement('BUTTON');
                    btn.innerHTML = 'Confirm';
                    btn.type = 'submit';
                    btn.name = 'confirm';
                    btn.value = film.id;

                    var id = document.createElement('INPUT');
                    id.type = 'number';
                    id.name = 'id';
                    id.value = film.id;

                    var backdrop_path = document.createElement('INPUT');
                    backdrop_path.type = 'text';
                    backdrop_path.name = 'backdrop_path';
                    backdrop_path.value = film.backdrop_path;

                    var poster_path = document.createElement('INPUT');
                    poster_path.type = 'text';
                    poster_path.name = 'poster_path';
                    poster_path.value = film.poster_path;

                    var title = document.createElement('INPUT');
                    title.type = 'text';
                    title.name = 'title';
                    title.value = film.title;

                    var original_title = document.createElement('INPUT');
                    original_title.type = 'text';
                    original_title.name = 'original_title';
                    original_title.value = film.original_title;

                    var original_language = document.createElement('INPUT');
                    original_language.type = 'text';
                    original_language.name = 'original_language';
                    original_language.value = film.original_language;

                    var release_date = document.createElement('INPUT');
                    release_date.type = 'date';
                    release_date.name = 'release_date';
                    release_date.value = film.release_date;

                    var origin_country = document.createElement('INPUT');
                    origin_country.type = 'text';
                    origin_country.name = 'origin_country';
                    origin_country.value = film.production_countries[0]['iso_3166_1'];

                    var genres = document.createElement('INPUT');
                    genres.type = 'text';
                    genres.name = 'genres';
                    genres.value = film.genres[0]['name'];

                    var runtime = document.createElement('INPUT');
                    runtime.type = 'number';
                    runtime.name = 'runtime';
                    runtime.value = film.runtime;

                    var popularity = document.createElement('INPUT');
                    popularity.type = 'text';
                    popularity.name = 'popularity';
                    popularity.value = film.popularity;

                    var vote_count = document.createElement('INPUT');
                    vote_count.type = 'number';
                    vote_count.name = 'vote_count';
                    vote_count.value = film.vote_count;

                    var vote_average = document.createElement('INPUT');
                    vote_average.type = 'number';
                    vote_average.step = '0.1';
                    vote_average.name = 'vote_average';
                    vote_average.value = film.vote_average;

                    var overview = document.createElement('TEXTAREA');
                    overview.type = 'text';
                    overview.name = 'overview';
                    overview.value = film.overview;

                    var video = document.createElement('INPUT');
                    video.type = 'text';
                    video.name = 'video';
                    video.placeholder = 'Paste video link here';

                    var form = document.createElement('FORM');
                    form.action = 'bdd.php';
                    form.method = 'post';
                    form.appendChild(id);
                    form.appendChild(br00);
                    form.appendChild(backdrop_path);
                    form.appendChild(br01);
                    form.appendChild(poster_path);
                    form.appendChild(br02);
                    form.appendChild(title);
                    form.appendChild(br03);
                    form.appendChild(original_title);
                    form.appendChild(br04);
                    form.appendChild(original_language);
                    form.appendChild(br05);
                    form.appendChild(release_date);
                    form.appendChild(br06);
                    form.appendChild(origin_country);
                    form.appendChild(br07);
                    form.appendChild(genres);
                    form.appendChild(br08);
                    form.appendChild(runtime);
                    form.appendChild(br09);
                    form.appendChild(popularity);
                    form.appendChild(br10);
                    form.appendChild(vote_count);
                    form.appendChild(br11);
                    form.appendChild(vote_average);
                    form.appendChild(br12);
                    form.appendChild(overview);
                    form.appendChild(br13);
                    form.appendChild(video);
                    form.appendChild(br14);
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
            $id = $_POST['id'];
            $backdrop_path = $_POST['backdrop_path'];
            $poster_path = $_POST['poster_path'];
            $title = $_POST['title'];
            $original_title = $_POST['original_title'];
            $original_language = $_POST['original_language'];
            $release_date = $_POST['release_date'];
            $origin_country = $_POST['origin_country'];
            $genres = $_POST['genres'];
            $runtime = $_POST['runtime'];
            $popularity = $_POST['popularity'];
            $vote_count = $_POST['vote_count'];
            $vote_average = $_POST['vote_average'];
            $overview = $_POST['overview'];
            $video = $_POST['video'];
            $request = $db->prepare('INSERT INTO films(id, backdrop_path, poster_path, title, original_title, original_language, release_date, origin_country, genres, runtime, popularity, vote_count, vote_average, overview, video) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); //prepare add command
            $request->execute(array($id, $backdrop_path, $poster_path, $title, $original_title, $original_language, $release_date, $origin_country, $genres, $runtime, $popularity, $vote_count, $vote_average, $overview, $video)); // add new element in database
            echo "<h4>Film added to database.</h4>";   
        }
    ?>
    <!-- <p><img src="https://image.tmdb.org/t/p/w185/s2xcqSFfT6F7ZXHxowjxfG0yisT.jpg" alt="Jaws"/></p> -->
    <!-- <p><img src="https://image.tmdb.org/t/p/w185/3nYlM34QhzdtAvWRV5bN4nLtnTc.jpg" alt="Jaws"/></p> -->
    <div id='output'></div>
</body>
</html>