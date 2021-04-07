<header>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-warning" href="/index.php">RETROFLIX</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white" href="/base/browse.php">BROWSE MOVIES</a>
          </li>
        </ul>
        <form class="d-flex" action="/base/search.php" method="get">
          <input class="form-control me-2" type="search" name="keyword" placeholder="Recherche..." aria-label="search">
          <button class="btn btn-secondary" type="submit" name="search"><i class="fas fa-search"></i></button>
        </form>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <?php
            if(isset($_SESSION['pseudo'])) {
              echo "
              <li class='nav-item'>
                <a class='nav-link text-white' aria-current='page' href='/users/account.php'><i class='fs-1 fas fa-user-circle'></i></i></a>
              </li>
              ";
            }
          ?>
          <?php
            if(!isset($_SESSION['pseudo'])) {
              echo "
                <li class='nav-item'>
                  <a class='nav-link text-white' aria-current='page' href='/users/create-account.php'><i class='fs-5 fas fa-user-plus'></i></a>
                </li>
                <li class='nav-item'>
                  <a class='nav-link text-white' aria-current='page' href='/users/sign-in.php'><i class='fs-5 fas fa-sign-in-alt'></i></a>
                </li>
              ";
            }
          ?>
          <?php
            if(isset($_SESSION['pseudo'])) {
              echo "
              <li class='nav-item'>
                <a class='nav-link text-white' aria-current='page' href='/users/deconnexion.php'><i class='fs-5 fas fa-sign-out-alt'></i></a>
              </li>
              ";
            }
          ?>
        </ul>        
      </div>
    </div>
  </nav>
</header>