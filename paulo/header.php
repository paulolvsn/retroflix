<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand text-warning" href="/retroflix/paulo/index.php">RETROFLIX</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
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
          <a class="nav-link" aria-current="page" href="/users/create-account.php"><i class="fas fa-user-plus"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/users/sign-in.php"><i class="fas fa-sign-in-alt"></i></a>
        </li>
    </div>
    </nav>