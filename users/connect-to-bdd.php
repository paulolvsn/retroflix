<?php
    try
    {
        // $bdd = new PDO('mysql:host=database;dbname=retroflix;charset=utf8', 'root', 'root');
        // $bdd = new PDO('mysql:host=localhost;dbname=id16499719_retroflix;charset=utf8', 'id16499719_admin', 'fJC(C?u+<x85+b-M');
	$bdd = new PDO('mysql:host=localhost;dbname=id16499719_retroflix;charset=utf8', 'root', 'TcmhP*2lqWew$GH2@nbC');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
?>
