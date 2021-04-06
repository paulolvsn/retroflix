<div class="container">
    <div class="row">
    <h1>Admin Panel</h1>
        <div role="tabpanel">
            <!-- List group -->
            <div class="list-group list-group-horizontal" id="adminPanel" role="tablist">
                <a class="list-group-item list-group-item-action active" id="btnManageFilms" data-bs-toggle="list" href="#manageFilms" role="tab">Manage Films</a>
                <a class="list-group-item list-group-item-action" id="btnAddFilm" data-bs-toggle="list" href="#addFilm" role="tab">Add Film</a>
                <a class="list-group-item list-group-item-action" id="btnAddTorrent" data-bs-toggle="list" href="#addTorrent" role="tab">Add Torrent</a>
                <a class="list-group-item list-group-item-action" id="btnManageUsers" data-bs-toggle="list" href="#manageUsers" role="tab">Manage Users</a>
                <a class="list-group-item list-group-item-action" id="btnManageComments" data-bs-toggle="list" href="#manageComments" role="tab">Manage Comments</a>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="manageFilms" role="tabpanel">
                    <?php
                        include "../connect-to-bdd.php"; // open database
                        include "manageFilms.php";
                    ?>
                </div>
                <div class="tab-pane" id="addFilm" role="tabpanel">
                    <?php
                        include "../connect-to-bdd.php"; // open database
                        include "../key.php"; // load API key
                        include "addFilm.php";
                    ?>
                </div>
                <div class="tab-pane" id="addTorrent" role="tabpanel">
                    <?php
                        include "../connect-to-bdd.php"; // open database
                        include "../key.php"; // load API key
                        include "addTorrent.php";
                        ?>
                </div>
                <div class="tab-pane" id="manageUsers" role="tabpanel">
                    <?php
                        include "../connect-to-bdd.php"; // open database
                        include "manageUsers.php";
                        ?>
                </div>
                <div class="tab-pane" id="manageComments" role="tabpanel">
                    <?php
                        include "../connect-to-bdd.php"; // open database
                        include "manageComments.php";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>