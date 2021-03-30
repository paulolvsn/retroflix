<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Using TheMovieDB</title>
        <meta name="viewport" content="width=device-width">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <div class="container">
                <div class="row">
                    <h1>Add Films to Database</h1>
                    <strong>Search film:</strong>
                    <form method="post" action="bdd.php">
                        <input type="text" name="keyword" placeholder="Keyword" required>
                        <button class="btn btn-primary" type="submit" name="searchFilm">Search</button>
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
                                        
                                        var btn = document.createElement('BUTTON');
                                        btn.innerHTML = 'Add to database';
                                        btn.type = 'submit';
                                        btn.name = 'addFilm';
                                        btn.value = film.id;
                                        btn.classList.add('btn');
                                        btn.classList.add('btn-primary');

                                        var textarea = document.createElement('TEXTAREA');
                                        textarea.name = 'textarea';
                                        textarea.form = film.original_title;
                                        textarea.value = film.original_title;
                                        textarea.disabled = 'true';
                                        textarea.style.width = '100%';
                                        textarea.style.resize = 'none';

                                        var input = document.createElement('INPUT');
                                        input.name = 'name';
                                        input.type = 'hidden';
                                        input.value = film.original_title;

                                        var form = document.createElement('FORM');
                                        form.action = 'bdd.php';
                                        form.method = 'post';
                                        form.id = film.original_title;
                                        form.appendChild(textarea);
                                        form.appendChild(input);
                                        form.appendChild(btn);
                                        
                                        var divBody = document.createElement('DIV');
                                        divBody.classList.add('card-body');
                                        divBody.appendChild(form);

                                        var img = document.createElement('IMG');
                                        img.src = 'https://image.tmdb.org/t/p/w342/'+film.poster_path;
                                        img.alt = film.title;
                                        img.classList.add('card-img-top');

                                        var divCard = document.createElement('DIV');
                                        divCard.classList.add('card');
                                        divCard.classList.add('h-100');
                                        divCard.appendChild(img);
                                        divCard.appendChild(divBody);

                                        var divCol = document.createElement('DIV');
                                        divCol.classList.add('col-12');
                                        divCol.classList.add('col-md-3');
                                        divCol.appendChild(divCard);
                                        
                                        document.getElementById('output').appendChild(divCol);
                                    });   
                                })
                                </script>";
                        }
                        // IF add film button clicked
                        if(isset($_POST['addFilm'])) {
                            $id = $_POST['addFilm'];
                            $name = $_POST['name'];
                            echo $name;
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
                                    var br15 = document.createElement('BR');

                                    var btn = document.createElement('BUTTON');
                                    btn.innerHTML = 'Confirm';
                                    btn.type = 'submit';
                                    btn.name = 'confirm';
                                    btn.value = film.id;
                                    btn.classList.add('btn');
                                    btn.classList.add('btn-primary');

                                    var id = document.createElement('INPUT');
                                    id.type = 'number';
                                    id.name = 'id';
                                    id.value = film.id;
                                    id.classList.add('w-100');

                                    var imdb_id = document.createElement('INPUT');
                                    imdb_id.type = 'text';
                                    imdb_id.name = 'imdb_id';
                                    imdb_id.value = film.imdb_id;
                                    imdb_id.classList.add('w-100');

                                    var backdrop_path = document.createElement('INPUT');
                                    backdrop_path.type = 'text';
                                    backdrop_path.name = 'backdrop_path';
                                    backdrop_path.value = film.backdrop_path;
                                    backdrop_path.classList.add('w-100');

                                    var poster_path = document.createElement('INPUT');
                                    poster_path.type = 'text';
                                    poster_path.name = 'poster_path';
                                    poster_path.value = film.poster_path;
                                    poster_path.classList.add('w-100');

                                    var title = document.createElement('INPUT');
                                    title.type = 'text';
                                    title.name = 'title';
                                    title.value = film.title;
                                    title.classList.add('w-100');

                                    var original_title = document.createElement('INPUT');
                                    original_title.type = 'text';
                                    original_title.name = 'original_title';
                                    original_title.value = film.original_title;
                                    original_title.classList.add('w-100');

                                    var original_language = document.createElement('INPUT');
                                    original_language.type = 'text';
                                    original_language.name = 'original_language';
                                    original_language.value = film.original_language;
                                    original_language.classList.add('w-100');

                                    var release_date = document.createElement('INPUT');
                                    release_date.type = 'date';
                                    release_date.name = 'release_date';
                                    release_date.value = film.release_date;
                                    release_date.classList.add('w-100');

                                    var allCountries = '';
                                    film.production_countries.forEach(function(country) {
                                        if (allCountries == '') {
                                            allCountries = country['iso_3166_1']; 
                                        } else {
                                        allCountries = allCountries + ' ' + country['iso_3166_1'];
                                        }
                                    });
                                    var origin_country = document.createElement('INPUT');
                                    origin_country.type = 'text';
                                    origin_country.name = 'origin_country';
                                    origin_country.value = allCountries;
                                    origin_country.classList.add('w-100');
                                    
                                    var allGenres = '';
                                    film.genres.forEach(function(genre) {
                                        if (allGenres == '') {
                                            allGenres = genre['name']; 
                                        } else {
                                        allGenres = allGenres + ' ' + genre['name'];
                                        }
                                    });
                                    var genres = document.createElement('INPUT');
                                    genres.type = 'text';
                                    genres.name = 'genres';
                                    genres.value = allGenres;
                                    genres.classList.add('w-100');

                                    var runtime = document.createElement('INPUT');
                                    runtime.type = 'number';
                                    runtime.name = 'runtime';
                                    runtime.value = film.runtime;
                                    runtime.classList.add('w-100');

                                    var popularity = document.createElement('INPUT');
                                    popularity.type = 'text';
                                    popularity.name = 'popularity';
                                    popularity.value = film.popularity;
                                    popularity.classList.add('w-100');

                                    var vote_count = document.createElement('INPUT');
                                    vote_count.type = 'number';
                                    vote_count.name = 'vote_count';
                                    vote_count.value = film.vote_count;
                                    vote_count.classList.add('w-100');

                                    var vote_average = document.createElement('INPUT');
                                    vote_average.type = 'number';
                                    vote_average.step = '0.1';
                                    vote_average.name = 'vote_average';
                                    vote_average.value = film.vote_average;
                                    vote_average.classList.add('w-100');

                                    var overview = document.createElement('TEXTAREA');
                                    overview.type = 'text';
                                    overview.name = 'overview';
                                    overview.value = film.overview;
                                    overview.classList.add('w-100');

                                    var video = document.createElement('INPUT');
                                    video.type = 'text';
                                    video.name = 'video';
                                    video.placeholder = 'Paste video link here';
                                    video.classList.add('w-100');

                                    var form = document.createElement('FORM');
                                    form.action = 'bdd.php';
                                    form.method = 'post';
                                    form.appendChild(id);
                                    form.appendChild(br00);
                                    form.appendChild(imdb_id);
                                    form.appendChild(br01);
                                    form.appendChild(backdrop_path);
                                    form.appendChild(br02);
                                    form.appendChild(poster_path);
                                    form.appendChild(br03);
                                    form.appendChild(title);
                                    form.appendChild(br04);
                                    form.appendChild(original_title);
                                    form.appendChild(br05);
                                    form.appendChild(original_language);
                                    form.appendChild(br06);
                                    form.appendChild(release_date);
                                    form.appendChild(br07);
                                    form.appendChild(origin_country);
                                    form.appendChild(br08);
                                    form.appendChild(genres);
                                    form.appendChild(br09);
                                    form.appendChild(runtime);
                                    form.appendChild(br10);
                                    form.appendChild(popularity);
                                    form.appendChild(br11);
                                    form.appendChild(vote_count);
                                    form.appendChild(br12);
                                    form.appendChild(vote_average);
                                    form.appendChild(br13);
                                    form.appendChild(overview);
                                    form.appendChild(br14);
                                    form.appendChild(video);
                                    form.appendChild(br15);
                                    form.appendChild(btn);

                                    var divBody = document.createElement('DIV');
                                    divBody.classList.add('card-body');
                                    divBody.appendChild(form);

                                    var divRight = document.createElement('DIV');
                                    divRight.classList.add('col-md-8');
                                    divRight.classList.add('col-12');
                                    divRight.appendChild(divBody);

                                    var img = document.createElement('IMG');
                                    img.src = 'https://image.tmdb.org/t/p/w342/'+film.poster_path;
                                    img.alt = film.title;

                                    var divLeft = document.createElement('DIV');
                                    divLeft.classList.add('col-md-4');
                                    divLeft.classList.add('col-12');
                                    divLeft.appendChild(img);
                                    
                                    var divRow = document.createElement('DIV');
                                    divRow.classList.add('row');
                                    divRow.classList.add('g-0');
                                    divRow.appendChild(divLeft);
                                    divRow.appendChild(divRight);

                                    var divCard = document.createElement('DIV');
                                    divCard.classList.add('card');
                                    divCard.classList.add('border-dark');
                                    divCard.appendChild(divRow);
                                        
                                    document.getElementById('output').appendChild(divCard);
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
                            $imdb_id = $_POST['imdb_id'];
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
                            $torrent = "";
                            $request = $db->prepare('INSERT INTO films(id, imdb_id, backdrop_path, poster_path, title, original_title, original_language, release_date, origin_country, genres, runtime, popularity, vote_count, vote_average, overview, video, torrent) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); //prepare add command
                            $request->execute(array($id, $imdb_id, $backdrop_path, $poster_path, $title, $original_title, $original_language, $release_date, $origin_country, $genres, $runtime, $popularity, $vote_count, $vote_average, $overview, $video, $torrent)); // add new element in database
                            echo "<h4>Film added to database.</h4>";   
                        }
                    ?>
                </div>
                <div class="row g-3" id='output'></div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>