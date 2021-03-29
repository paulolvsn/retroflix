<?php
try
{
	$bdd = new PDO('mysql:host=database;dbname=retroflix;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>