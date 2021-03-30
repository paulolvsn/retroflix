<?php 
session_start();
if (!(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])))
{
header("Location: create-account.php?failed=notRegistered");
}
