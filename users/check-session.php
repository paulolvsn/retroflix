<?php 
session_start();
if (!(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])))
{
    $pseudo = $_SESSION['pseudo'];
}
