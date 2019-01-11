<?php
//ceci est le fichier de connexion à la base de données
try {
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
	//On indique l'endroit où se trouve la base de donnée
	$db=new PDO('mysql:host=127.0.0.1; dbname=snowboard', 'root','');
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //Mettre les noms des champs qui arrivent dans la base de données en majuscule
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Lancer des exceptions en cas d'erreurs

	}
	//Pour afficher le type d'erreur
	catch (PDOException $e){
		die('Erreur :'.$e->getMessage());
	}



?>