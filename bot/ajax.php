<?php
  $bdd = new PDO('mysql:host=localhost;dbname=snowboard;charset=utf8', 'root', '');

  
    // $phrases = $bdd->query('SELECT * FROM longboards');
    $phrases = $bdd->query('SELECT * FROM chatbot WHERE type = "SLALOM"');
    $phrases = $phrases->fetch();

  // On récupère le message de l'user via le $_POST de index.php
  $message = trim( strtolower( $_POST['message'] ) );

  // En fonction de la réponse, on envoi un message personnalisé :
    if ($message == 'bonjour') {
      $reponse = $phrases['Rep1'].'. '.$phrases['Rep2'];
    }
    else if (strpos($message, 'aide') !== false) {
      $reponse = $phrases['Rep3'];
    }
    else {
      $reponse = 'Désolé, je n\'ai pas compris votre demande.';
    }

  // On envoi la réponse finale vers le script de index.php
  echo $reponse;

?>
