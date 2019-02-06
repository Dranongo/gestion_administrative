<?php
function getEmployee(){
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=gestion_administrative;charset=utf8', 'root', ''); 
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->query('SELECT nom_salarie from salarie ORDER BY ASC');

	return $req;
}
?>