<?php
  $bdd = new PDO('mysql:host=localhost;dbname=snowboard;charset=utf8', 'root', '');

  // A rectifier en fonction de la ligne d'où on prend les infos
    // $phrases = $bdd->query('SELECT * FROM longboards');

  // On récupère l'id du produit ciblé
  $ID = $_POST['ID'];
  // On recupère la quantité envoyée
  $quantite = $_POST['quantite'];

  $stock = $bdd->query("SELECT quantite FROM stock WHERE code = '".$ID."'");
  $result_stock = $stock->fetch();

  $new_stock = intval($result_stock[0]) - intval($quantite);

  // On met a jour la quantité dans la BDD a la ligne du code du produit ciblé
  $update = $bdd->query("UPDATE stock SET quantite = '".$new_stock."' WHERE code = '".$ID."'");

  // On envoi la quantité finale vers le script de fiche.php
  echo $new_stock;

?>
