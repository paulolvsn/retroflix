<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<?php 
if(isset($_GET['register'])){
    if($_GET['register']=="ok"){
        echo "<p> Your account have been created. Last step, connect to your account </p>";
    }    
}

?>

<div class="container" >
    <div class="row mt-5">
        <div class="mt-5 col-2 offset-5 border border-dark border-2 rounded shadow p-3 mb-5 bg-body rounded">
            <form  action="sign-in-check.php" method="post">
                <label class="form-label" for="pseudo">Pseudo</label>
                    <input class="form-control"  type="text" name="pseudo"><br>
                <label for="password" class="form-label">Password</label>
                    <input class="form-control"  type="password" name="password">
                    <br>
                <div class="d-grid gap-2">    
                    <input class="btn btn-outline-primary btn-block"  type="submit" value="connexion"><br>
                </div>
                <a class="link-secondary" href="create-account.php">Create an Account</a>
                <a class="link-secondary" href="password-recovery-form.php">Forgotten password ?</a><br>
            </form>
        </div>
    </div>
</div>



