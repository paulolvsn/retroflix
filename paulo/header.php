<!-- <section class="navigation-bar">
        <h1 id="logo"><a href="index.php">RETROFLIX</h1></a>
        <a href="browse.php" id="browse">BROWSE MOVIES</a>
        <input type="text" placeholder="Search...">
        <a href="users/create-account.php"><button type="button">INSCRIPTION</button></a>
        <a href="users/sign-in.php"><button type="button" href="users/sign-in.php">CONNEXION</button></a>
    </section> -->
    <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RETROFLIX</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="browse.php">BROWSE MOVIES</a>
        </li>
      </ul>
      <form action="search.php" method="get" class="d-flex">
      <input class="form-control me-2" type="search" name="keyword" placeholder="Recherche par Titre ou Genre..." aria-label="search">
                        <button class="btn btn-secondary" type="submit" name="search"><i class="fas fa-search"></i></button>
      </form>
      <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/users/create-account.php">S'inscrire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/users/sign-in.php">Se connecter</a>
        </li>
    </div>
  </div>
</nav>