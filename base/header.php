<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="z-index:10;">
        <div class="container-fluid px-5">
            <a class="navbar-brand text-warning fs-3 retroflix" href="/index.php">RETROFLIX</a>
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
                        <input class="form-control me-2 rounded-pill" type="search" name="keyword" placeholder="Recherche..." aria-label="search">
                        <button class="btn btn-secondary rounded-circle" type="submit" name="search"><i class="fas fa-search"></i></button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0 me-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                                if(isset($_SESSION['pseudo'])) {
                                    include($_SERVER['DOCUMENT_ROOT'] . "/users/connect-to-bdd.php"); // open database
                                    $pseudo = $_SESSION['pseudo'];
                                    $request = $bdd->query("SELECT * FROM users WHERE pseudo = '$pseudo' ");
                                    $user = $request->fetch();
                                    $request->closeCursor();
                                    $avatar = $user['avatar'];
                                    echo "
                                        <img class='rounded-circle' width='50px' src='/users/$avatar' alt=$pseudo>
                                    ";
                                }
                                else {
                                    echo "
                                        <i class='fs-1 fas fa-user-circle'></i>
                                    ";
                                }
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                            <?php
                                if(isset($_SESSION['pseudo'])) {
                                    echo "
                                        <li class='dropdown-item'>
                                            <a class='nav-link text-white' href='/users/account.php' data-bs-toggle='tooltip' data-bs-placement='top' title='User panel'><i class='fs-3 fas fa-user-circle'></i> Mon profil </a>
                                        </li>
                                    ";
                                }
                            ?>
                            <?php
                                if(!isset($_SESSION['pseudo'])) {
                                    echo "
                                        <li class='dropdown-item'>
                                            <a class='nav-link text-white' href='/users/create-account.php' data-bs-toggle='tooltip' data-bs-placement='top' title='S&apos;enregistrer'><i class='fs-5 fas fa-user-plus'></i> S'enregistrer </a>
                                        </li>
                                        <li class='dropdown-item'>
                                            <a class='nav-link text-white' href='/users/sign-in.php' data-bs-toggle='tooltip' data-bs-placement='top' title='Se connecter'><i class='fs-5 fas fa-sign-in-alt'></i> Se connecter </a>
                                        </li>
                                    ";
                                }
                            ?>
                            <?php
                                if(isset($_SESSION['pseudo'])) {
                                    echo "
                                    <li class='dropdown-item'>
                                        <a class='nav-link text-white' href='/users/deconnexion.php' data-bs-toggle='tooltip' data-bs-placement='top' title='Se déconnecter'><i class='fs-5 fas fa-sign-out-alt'></i> Se déconnecter </a>
                                    </li>
                                    ";
                                }
                            ?>
                        </ul>
                    </li>
                </ul>        
            </div>
        </div>
    </nav>
</header>