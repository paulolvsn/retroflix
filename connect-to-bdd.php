<?php
try
{
	$bdd = new PDO('mysql:host=database;dbname=membre;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>