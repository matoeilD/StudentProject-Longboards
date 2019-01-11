<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bot </title>

  <style>
    .bot {
      margin: 5px;
      padding: 15px;
      background-color: #ffffff;
      font-family: sans-serif;
      box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
      max-width: 300px;
      font-size: 13px;
      display: flex;
      flex-direction:column;
    }
    .messages-wrapper {
      height: 300px;
      overflow: auto;
    }
    .messages {
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
    }
    .formulaire {
      padding-top: 15px;
    }
    .bot-textarea {
      font-family: sans-serif;
      border: 1px solid #d7d7d7;
      padding: 5px;
      width: 100%;
    }
    .bot-button {
      background-color: #4965f9;
      padding: 10px 15px;
      color: #ffffff;
      text-transform: uppercase;
      font-weight: bold;
      font-size: 12px;
      border-radius: 5px;
      border: 0;
      margin-top: 10px;
      margin-left: auto;
      margin-right: 0px;
    }
    .chat-message {
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      max-width: 250px;
      display: inline-block;
    }
    .user-message {
      background-color: #d7d7d7;
      background-color: #4965f9;
      color: #ffffff;
      margin-left: auto;
      margin-right: 0px;
    }
    .bot-message {
      background-color: #d7d7d7;
    }
  </style>

  <?php
    // Connexion à la BDD
    try {
      $bdd = new PDO('mysql:host=localhost;dbname=snowboard;charset=utf8', 'root', '');
    }
    catch (Exception $e) {
      $error = $e->getMessage();
      echo "Connexion au chatbox impossible : ".$error;
    }
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
    <?php // On créé un script AJAX (voir ajax.php) pour l'envoi du message et la recherche dans la BDD ?>
    $(function() {
        var requete;

        $("#message").keypress(function (e) {
          if(e.which == 13 && !e.shiftKey) {
            $(".formulaire").submit();
          }
        });

        $('.formulaire').bind('submit', function(event){

          event.preventDefault();
          if (requete) {
            requete.abort();
          }

          var $form = $(this);
          var datas = $form.serialize();
          console.log(datas);

          requete = $.ajax({
            url: "ajax.php",
            type: "post",
            data: datas
          });

          requete.done(function (response, textStatus, jqXHR){
            <?php // Si tout va bien, on affiche le message dans la chatbox et on affiche ensuite la réponse du bot ?>
            $('.messages').append('<div class="chat-message user-message">'+ $('#message').val() +'</div>');
            $('#message').val('');
            console.log("Message bien reçu");
            console.log(response);
            $('.messages').append('<div class="chat-message bot-message">'+response+' </div>');
          });

          requete.fail(function (jqXHR, textStatus, errorThrown){
            <?php // Si problème, on affiche un message d'erreur dans la chatbox ?>
            console.error(
              "Une erreur est survenue: "+
              textStatus, errorThrown
            );
            $('.messages').append('<div class="chat-message bot-message erreur">Une erreur est survenue, merci de réessayer plus tard.</div>');
          });

        });
    });
  </script>

</head>
<body>

<div class="bot">

  <?php
    // Si probleme de connexion à la BDD
  /*  if ($error) {
      echo "Connexion au chatbox impossible : ".$error;

    } else if ($bdd) {*/
    // Si pas de problème, on affiche la chatbox ?>

      <div class="bot-inner">

        <div class="messages-wrapper">
          <div class="messages">
          </div>
        </div>

        <form method="POST" class="formulaire">
          <textarea class="bot-textarea" name="message" id="message" placeholder="Entrez votre message ..."></textarea>
          <input class="bot-button" type='submit' name='submit'>
        </form>
        <p>par exmple bonjour ou aide</p>
      </div>

  <?php /*} */?>
  
  
  
  

</div>

</body>
</html>
