<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=id16499719_retroflix;charset=utf8', 'id16499719_admin', 'fJC(C?u+<x85+b-M');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>