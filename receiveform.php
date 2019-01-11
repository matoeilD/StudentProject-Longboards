<?php
session_start();
require('dbconnect.php');
//Ce fichier sert à la réception des données du formulaire
$nom=$_POST['nom'];
$email=$_POST['email'];
$message=$_POST['message'];
//Les $ reçoivent la valeur de la variable pour chaque entrée
//Nous déclarons donc les 3 entrées que nous souhaitons enregistrer dans la base de donnée
echo "Votre Nom est : ".$nom."<br>Votre email est : ".$email."<br>Votre message est : ".$message;
//Les deux lignes de code suivantes permettent de faire l'insertion dans la base de données
//on a créé une variable db qui est notre base de données
$insert=$db->prepare("INSERT INTO contacts(nom, email, message) VALUES (?,?,?)");
//on execute l'insertion dans un tableau grâce à array
$insert->execute(array($nom,$email,$message));

//redirection sur notre page de base index.php
header('Location:index.php');

?>