<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <main>
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
                                <?php include "adminRemoveFilm.php" ?>
                            </div>
                            <div class="tab-pane" id="addFilm" role="tabpanel">
                                <?php include "adminAddFilm.php" ?>
                            </div>
                            <div class="tab-pane" id="addTorrent" role="tabpanel">
                                <?php include "adminAddTorrent.php" ?>
                            </div>
                            <div class="tab-pane" id="manageUsers" role="tabpanel">
                                <?php include "adminUser.php" ?>
                            </div>
                            <div class="tab-pane" id="manageComments" role="tabpanel">
                                <?php include "adminComment.php" ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>