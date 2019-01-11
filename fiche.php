<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
//Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=snowboard', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
$leproduitclique = isset($_GET["idProduit"]) ? $_GET["idProduit"] : 1;
$sql = "SELECT * FROM longboards WHERE `id` =  $leproduitclique ";
foreach ($bdd->query($sql) as $row) {
  $longboards [] = $row;
}

//Upload de la vidéo dans le dossier video
if (isset($_POST['video-button'])) {
  $errors = [];
  $success = "";
  if (isset($_FILES['video'])) {
    //Nom du fichier
    $file_name = $_FILES['video']['name'];
    //Taille du fichier
    $file_size = $_FILES['video']['size'];
    $file_tmp = $_FILES['video']['tmp_name'];
    //Récupération de l'extension
    $tmp = explode('.', $_FILES['video']['name']);
    //Passage de l'extension en miniscule (Exemple : MP4 en mp4)
    $file_ext = strtolower(end($tmp));

    //Extension possible
    $extensions = ["mp4", "webm", "mpeg", "flv"];

    //Vérification de l'extension
    if (in_array($file_ext, $extensions) === FALSE) {
      $errors[] = "L'extension du fichier est non autorisée";
    }

    //Vérification de la taille de la vidéo 15MB
    if ($file_size > 15728640) {
      $errors[] = 'La taille de la vidéo ne doit pas dépasser 15 MB';
    }


    //Upload de la vidéo
    if (empty($errors) == TRUE) {
      //Déplacement de la vidéo dans le dossier vidéo dans le cas ou il n'est pas déjà présent !!
      if (!file_exists("videos/" . $file_name)) {
        move_uploaded_file($file_tmp, "videos/" . $file_name);
        //INSERTION DU CHEMIN DE LA VIDEO EN BASE DE DONNÉES
        try {
          //Requête d'insertion
          $req = $bdd->prepare("INSERT INTO videos (id_longboard, nom_publieur, description, url) VALUES (:idProduit, :nom_publieur, :description, :url)");
          $req->execute([
            "idProduit" => $_POST['idProduit'],
            "nom_publieur" => $_POST['name'],
            "description" => $_POST['description'],
            "url" => "videos/" . $file_name,
          ]);
          $success = "Votre vidéo est publiée !";
        } catch (Exception $e) {
          echo 'Exception -> ';
          var_dump($e->getMessage());
        }
      }
      else {
        $errors[] = 'Veuillez renommer le nom de la vidéo car elle existe déjà dans le dossier.';
      }
    }
  }
  if (isset($_POST['lien-youtube'])) {
    if (strpos($_POST['lien-youtube'], "www.youtube.com/embed")) {
      try {
        //Récupération du lien youtube liées au produit en cours
        $sql = "SELECT * FROM videos WHERE `id_longboard` =  $leproduitclique ";
        foreach ($bdd->query($sql) as $row) {
          if ($row['url'] == $_POST['lien-youtube']) {
            $errors[] = "Cette vidéo a déjà été publiée par un utilisateur";
          }
        }
        if (empty($errors)) {
          $req = $bdd->prepare("INSERT INTO videos (id_longboard, nom_publieur, description, url) VALUES (:idProduit, :nom_publieur, :description, :url)");
          $req->execute([
            "idProduit" => $_POST['idProduit'],
            "nom_publieur" => $_POST['name'],
            "description" => $_POST['description'],
            "url" => $_POST['lien-youtube'],
          ]);
          $success = "Votre vidéo YOUTUBE est publiée !";
        }

      } catch (Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
      }
    }
  }
}

//Récupération des vidéos liées au produit en cours
$sql = "SELECT * FROM videos WHERE `id_longboard` =  $leproduitclique ";
foreach ($bdd->query($sql) as $row) {
  $videos[] = [
    'url' => $row['url'],
    'nom_publieur' => $row['nom_publieur'],
    'description' => $row['description'],
  ];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>PaPa Deck - Loaded Tan Tien - Longboard Skate</title>
    <!--mobile apps-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Sprint Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
      }, false);

      function hideURLbar() {
        window.scrollTo(0, 1);
      } </script>
    <!--mobile apps-->
    <!--Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/stylefiche.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <link rel="stylesheet" href="css/swipebox.css">

    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="js/modernizr.custom.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
          event.preventDefault();
          $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
        });
      });
    </script>
    <!-- //js --><!-- swipe box js -->
    <script src="js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
      jQuery(function ($) {
        $(".swipebox").swipebox();
      });
    </script>
    <!-- //swipe box js -->


    <!--web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'
          type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Poppins:400,500,600'
          rel='stylesheet' type='text/css'>
    <!--//web-fonts-->
    <!-- start-smoth-scrolling-->
    <script type="text/javascript">
      jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
          event.preventDefault();
          $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
      });
    </script>
    <style>
        .videos {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .videos p {
            color: black;
        }
    </style>
    <!--//end-smoth-scrolling-->
</head>
<body>
<!-- main content start-->
<!--start-home-->
<div id="home1" class="header">
    <div class="header-top">
        <!-- Navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed"
                            data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!--//end-banner-->
                <!--modal-video-->
                <div class="modal video-modal fade" id="myModal" tabindex="-1"
                     role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>LOADED TAN TIEN</h4>
                                <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <section>
                                <div class="modal-body">
                                    <p>Ut enim ad minima veniam, quis nostrum
                                        exercitationem ullam corporis suscipit
                                        laboriosam,
                                        nisi ut aliquid ex ea commodi
                                        consequatur? Quis autem
                                        vel eum iure reprehenderit qui in ea
                                        voluptate velit
                                        esse quam nihil molestiae consequatur,
                                        vel illum qui,Lorem ipsum dolor sit
                                        amet, consectetuer adipiscing elit, sed
                                        diam nonummy nibh euismod tincidunt ut
                                        laoreet dolore magna aliquam erat
                                        volutpat
                                        dolorem eum fugiat quo voluptas nulla
                                        pariatur.Lorem ipsum dolor sit amet,
                                        consectetuer adipiscing elit, sed diam
                                        nonummy nibh euismod tincidunt ut
                                        laoreet dolore magna aliquam erat
                                        volutpat
                                        <i>" Quis autem vel eum iure
                                            reprehenderit qui in ea voluptate
                                            velit
                                            esse quam nihil molestiae
                                            consequatur.</i></p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>


                <!---->

                <div class="collapse navbar-collapse navbar-right" id="navbar">
                    <div class="top-nav">

                        <a href="index.php" class="hover-effect">
								<span>
									<span>HOME</span>
									<span>HOME</span>
									<span></span>
								</span>
                        </a>

                        <a href="marques.php" class="hover-effect">
								<span>
									<span>MARQUES</span>
									<span>MARQUES</span>
									<span></span>
								</span>
                        </a>
                        <a href="produits.php" class="hover-effect">
								<span>
									<span>PRODUITS</span>
									<span>PRODUITS</span>
									<span></span>
								</span>
                        </a>

                        <a href="https://www.youtube.com/watch?v=KtsAGqo-V18"
                           class="hover-effect">
								<span>
									<span>VIDEO</span>
									<span>VIDEO</span>
									<span></span>
								</span>
                        </a>

                        <a href="contact.php" class="hover-effect">
								<span>
									<span>CONTACT</span>
									<span>CONTACT</span>
									<span></span>
								</span>
                        </a>
                    </div>
                </div>

            </div>
        </nav>
    </div>



    <!-- //Navbar -->
    <!--End-top-nav-script-->
    <!--//end-header-->
    <div class="clearfix"></div>
    <div class="banner-w3-info">
        <div class="logo1">
            <a href="index.html"><img src="images/logosite.png" alt=""
                                      class="img-responsive"></span></a>
        </div>
    </div>
    <ul class="social-icons">
        <li><a href="#"> </a></li>
        <li><a href="#" class="fb"> </a></li>
        <li><a href="#" class="in"> </a></li>
        <li><a href="#" class="dott"> </a></li>
    </ul>
</div>


<?php


// Récupération de l'id du produit
if(isset($_GET["idProduit"])) // si $_GET est défini
{
  $idProduit=$_GET["idProduit"];
  $sql="SELECT * FROM vues WHERE `id` =  $idProduit";
  $req = $bdd->prepare("SELECT * FROM vues WHERE idProduit = ?");
  $req->execute(array($_GET['idProduit']));
  $donnees = $req->fetch();

  // on récupère la valeure des vues et on incrémente de 1 (On ajoute 1).
  $UpdateVues = $donnees['nbreVue']+1;
  // on modifie la valeure du champ "vues"  pour lui ajouter une vue !
  $req = $bdd->prepare("UPDATE vues SET nbreVue = ? WHERE idProduit = ?");
  $req->execute([$UpdateVues,$idProduit]);

}


?>


<?php
//gestion des stocks

$bdd = new PDO('mysql:host=localhost;dbname=snowboard', 'root', '', array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

$sql="SELECT `quantite` FROM `stock`";//je sélectionne la quantité disponible dans le stock
foreach($bdd->query($sql)as $row){
  print 'la quantité est de ' .$row['quantite']."\t";//je renvoi la quantité disponible
}

$update=" UPDATE `stock` SET `quantite`=`quantite`-1"; //lorsque je clique sur le bouton, la quantité se réduit de 1

?>

<?php
/**
 * MISE A JOUR DE LA QUANTITE DANS LA BDD
 */
?>

<?php // script pour afficher des messages d'erreurs en fonction de ce qui fonctionne ou non?>
<script type="text/javascript">
  $(function() {
    var requete;

    $('.quantite_form').bind('submit', function(event){

      event.preventDefault();
      if (requete) {
        requete.abort();
      }

      var $form = $(this);
      var datas = $form.serializeArray();
      console.log(datas);

      requete = $.ajax({
        url: "ajax/quantite.php",
        type: "post",
        data: datas
      });

      requete.done(function (response, textStatus, jqXHR){
        <?php // Si tout va bien, on affiche un message de succes ?>
        $('.quantite_form').append('<div class="success">Le stock a bien été mis à jour : '+response+'</div>');
      });

      requete.fail(function (jqXHR, textStatus, errorThrown){
        <?php // Si problème, on affiche un message d'erreur ?>
        console.error(
          "Une erreur est survenue: "+
          textStatus, errorThrown
        );
        $('.quantite_form').append('<div class="erreur">Une erreur est survenue, merci de réessayer plus tard.</div>');
      });

    });
  });
</script>


<?php
$sql = $bdd->query( 'SELECT * FROM stock');
foreach( $sql as $row){ ?>

    <form method="POST" class="quantite_form">
        <label for="quantite">Stock pour le produit de code "<?php echo $row['code']; ?>" :</label>
        <input type="hidden" name="ID" value="<?php echo $row['code']; ?>" />
        <select name="quantite" id="quantite">
          <?php
          $i = 0;
          while ($i <= 50) {
            echo "<option value='".$i."'>".$i."</option>";
            $i++;//Je mets une quantité de 50 dans une liste déroulante
          }
          ?>
        </select>
        <input class="button" type='submit' name='quantite_submit'>
    </form>

<?php } ?>

<?php // FIN ?>

</div>
<!--//end-banner-->

<div id="about" class="banner-bottom">
    <div class="container">
        <div class="inner-w3">
            <h3 class="title">LOADED TAN TIEN <span></span></h3>
        </div>
        <div class="adt_grids">
            <div class="col-md-5 about_left wow flipInY"
                 data-wow-duration="1.5s" data-wow-delay="0s">
                <img src="images/g9.jpg" alt="" class="img-responsive">
            </div>
            <div class="col-md-7 about_right wow flipInY"
                 data-wow-duration="1.5s" data-wow-delay="0.1s">
                <div class="creative">
                    <h4>FICHE TECHNIQUE</h4>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                        sed diam nonummy nibh euismod tincidunt ut laoreet
                        dolore magna aliquam erat,nibh euismod tincidunt ut
                        laoreet...</p>
                    <div class="more">
                        <a href="#" class="hvr-shutter-in-vertical"
                           data-toggle="modal" data-target="#myModal">Read
                            More<span
                                    class="glyphicon glyphicon-arrow-right"></span></a>
                    </div>
                    <div class="progress-gds">
                        <h5>Dancing / 60%</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                 aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 60%;">
                            </div>
                        </div>
                        <h5>Downhill / 45%</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                 aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 45%;">
                            </div>
                        </div>
                        <h5>Freestyle / 15%</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                 aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 15%;">
                            </div>
                        </div>
                        <h5>Cruising / 60%</h5>
                        <h5>Vues : <?php echo $donnees['vues']+1;// On ajoute 1 au nombre de vues car la requête update est exécutée après le select , donc la vue courrante n'est pas calculée ! ?></h5>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar"
                                 aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 60%;">
                            </div>
                        </div>

                    </div>
                    <form action="ajouter-video.php">
                        <input type="hidden" name="idProduit"
                               value="<?php echo $_GET['idProduit'] ?>">
                        <button>Ajouter une vidéo</button>
                      <?php
                      //Affichage des erreurs/succés pour l'upload de la vidéo
                      if (isset($errors)) {
                        for ($i = 0; $i < count($errors); $i++) {
                          echo "<p style='color: red; font-size: 20px;'>" . $errors[$i] . "</p>";
                          echo '<br>';
                        }
                      }
                      if (isset($errors)) {
                        echo "<p style='color: green; font-size: 20px;'>" . $success . "</p>";
                      }
                      ?>
                    </form>
                </div>

            </div>
            <div class="clearfix"></div>
            <div class="videos">
              <?php
              if (isset($videos)) {
                $nb_video = count($videos);
                for ($i = 0; $i < $nb_video; $i++) {
                  echo "<h3>" . $videos[$i]['nom_publieur'] . "</h3>";
                  echo "<p>" . $videos[$i]['description'] . "</p>";
                  if (strpos($videos[$i]['url'], 'youtube.com')) {
                    echo '<iframe style="margin-bottom: 30px" width="500" height="300" src="' . $videos[$i]['url'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                  }
                  else {
                    echo '<video style="margin:10px" controls width="500" height="300" src="' . $videos[$i]['url'] . '"></video>';
                  }

                }
              }
              ?>
            </div>
        </div>
    </div>

</div>



<h3 class="titre_comment"> <strong>Ajouter un commentaire</strong> </h3><br/>
<div class="formulaire">
    <form method="post" action="">
        <strong>Pseudo :</strong> <input type="text" name="pseudo"/> <br/>
        <br/><textarea name='commentaire' rows='8' cols='45'>
				Votre commentaire ici.
			</textarea><br>
        <br/><input type="submit" name="valider" value="valider" class="valider"/>
    </form>
</div>

<?php

// SI LE FORMULAIRE DE COMMENTAIRES EST VALIDE, ON INSERE LES DONNEES DANS LA BDD
if(isset($_POST['valider']))
{
  echo "<div align='center'><h2> Commentaire bien reçu ! </h2></div>";

  $pseudo=$_POST['pseudo'];
  $commentaire=$_POST['commentaire'];
  $datetime = date("Y-m-d H:i:s");

  $req = $bdd->prepare('INSERT INTO `commentaires`(`id`, `id_fiche`, `pseudo`, `commentaire`, `date_commentaire`) VALUES (?,?,?,?,?)');
  $req->execute(array('',$leproduitclique, $pseudo, $commentaire, $datetime));

}
?>




<div class="comments">
    <h3>COMMENTAIRES</h3>
    <br/>
</div>

<?php

// RECUPERATION DE TOUS LES COMMENTAIRES ASSOCIES A CE PRODUIT
$commentaire = $bdd->query("SELECT * FROM commentaires WHERE id_fiche = $leproduitclique ORDER BY date_commentaire DESC") ;

// AFFICHAGE DES COMMENTAIRES, UN PAR UN
while ($donnees = $commentaire->fetch()) {
?>

<div class="commentaires">
    <div >
        <h4><?php echo ($donnees['pseudo']); ?> </h4>
        <p><?php echo ($donnees ['date_commentaire']); ?></p>
        <p><?php echo nl2br ($donnees['commentaire']); ?> </p>
        <form method="post" action=""><textarea name='reponse' rows='1' cols='45'>
			</textarea><input type="submit" name="repondre" value="repondre" class="repondre"/></form><br/>
    </div>

  <?php

  }
  $commentaire->closeCursor(); // FIN TRAITEMENT REQUETE POUR LES COMMENTAIRESTermine le traitement de la requête pour les commentaires

?>

  <?php
  // SI LE FORMULAIRE DE REPONSE EST VALIDE, ON INSERE LES DONNEES DANS LA BDD
  if(isset($_POST['repondre'])) {

    $reponse=$_POST['reponse'];

    //$bdd = new PDO('mysql:host=localhost;dbname=snowboard', 'root', '');
    $req = $bdd->prepare('INSERT INTO `reponses`(`id`, `reponse`) VALUES (?,?)');
    $req->execute(array('', $reponse));
  }







  ?>

<!---->
<div class="content-bottom" id="news">
    <div class="inner-w3 agl">
        <h3 class="title">OTHER LOADED DECK<span></span></h3>
    </div>
    <div class="content-in">
        <div class="port effect-1">
            <div class="image-box">
                <a href="..."><img src="images/g7.jpg" alt=""
                                   class="img-responsive"></a>
            </div>
            <div class="text-desc">
                <a href="..."><h6>LOADED TAN TIEN</h6></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor .</p>
                <h5>Jan.26.2016</h5>
            </div>
        </div>
    </div>
    <div class="content-in">
        <div class="port effect-1">
            <div class="image-box">
                <a href="..."><img src="images/g1.jpg" alt=""
                                   class="img-responsive"></a>
            </div>
            <div class="text-desc">
                <a href="..."><h6>SECTOR 9 FIDJI</h6></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor .</p>
                <h5>Mar.30.2016</h5>
            </div>
        </div>
    </div>
    <div class="content-in">
        <div class="port effect-1">
            <div class="image-box">
                <a href="..."><img src="images/g4.jpg" alt=""
                                   class="img-responsive"></a>
            </div>
            <div class="text-desc">
                <a href="..."><h6>B2 GRIMA</h6></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor .</p>
                <h5>Jun.16.2016</h5>
            </div>
        </div>
    </div>
    <div class="content-in">
        <div class="port effect-1">
            <div class="image-box">
                <a href="#..."><img src="images/g6.jpg" alt=""
                                    class="img-responsive"></a>
            </div>
            <div class="text-desc">
                <a href="..."><h6>FW BIBORD</h6></a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor .</p>    <h5>Aug.30.2016</h5>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<!---->

<h3 class="titre_comment"><strong>Ajouter un commentaire</strong></h3><br/>
<div class="formulaire">
    <form method="post" action="">
        <strong>Pseudo :</strong> <input type="text" name="pseudo"/> <br/>
        <br/><textarea name='commentaire' rows='8' cols='45'>
				Votre commentaire ici.
			</textarea><br>
        <br/><input type="submit" name="valider" value="valider"
                    class="valider"/>
    </form>
</div>
<?php

// SI LE FORMULAIRE DE COMMENTAIRES EST VALIDE, ON INSERE LES DONNEES DANS LA BDD
if (isset($_POST['valider'])) {
  echo "<div align='center'><h2> Commentaire bien reçu ! </h2></div>";

  $pseudo = $_POST['pseudo'];
  $commentaire = $_POST['commentaire'];
  $datetime = date("Y-m-d H:i:s");

  $req = $bdd->prepare('INSERT INTO `commentaires`(`id`, `id_fiche`, `pseudo`, `commentaire`, `date_commentaire`) VALUES (?,?,?,?,?)');
  $req->execute(['', $leproduitclique, $pseudo, $commentaire, $datetime]);

}
?>

<!--//team -->
<div class="video">
    <div class="v-w3">
        <button class="v-b" data-toggle="modal" data-target="#modalvideo">LAST
            VIDEO : SEPAKUMA<span class="glyphicon glyphicon-play-circle"
                                  aria-hidden="true"></span></button>
    </div>
    <!-- Tooltip-Content -->
    <div class="tooltip-content">

        <div class="modal fade features-modal" id="modalvideo" tabindex="-1"
             role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Papa Deck TV</h4>
                        <button type="button" class="close two"
                                data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe src="https://www.youtube.com/watch?v=KtsAGqo-V18"
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

        </div>
        <!-- //Tooltip-Content -->
    </div>
</div>
<!-- footer -->
<div class="footer wow fadeIn animated animated" data-wow-delay="0.1s"
     data-wow-duration="0.2s">
    <div class="container">
        <div class="footer_top text-center">
            <div class="main-nav">
                <span class="menu"></span>
                <div class="top-menu">
                    <a href="index.php" class="hover-effect">
								<span>
									<span>HOME</span>
									<span>HOME</span>
									<span></span>
								</span>
                    </a>

                    <a href="marques.php" class="hover-effect">
								<span>
									<span>MARQUES</span>
									<span>MARQUES</span>
									<span></span>
								</span>
                    </a>
                    <a href="produits.php" class="hover-effect">
								<span>
									<span>PRODUITS</span>
									<span>PRODUITS</span>
									<span></span>
								</span>
                    </a>

                    <a href="https://www.youtube.com/watch?v=KtsAGqo-V18"
                       class="hover-effect">
								<span>
									<span>VIDEO</span>
									<span>VIDEO</span>
									<span></span>
								</span>
                    </a>

                    <a href="contact.php" class="hover-effect">
								<span>
									<span>CONTACT</span>
									<span>CONTACT</span>
									<span></span>
								</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="copy_right text-center">
            <ul class="social-icons two">
                <li><a href="#"> </a></li>
                <li><a href="#" class="fb"> </a></li>
                <li><a href="#" class="in"> </a></li>
                <li><a href="#" class="dott"> </a></li>
            </ul>
        </div>
    </div>
</div>
<!-- //footer -->

<!-- //footer -->
<!--//main content start-->
<!--start-smooth-scrolling-->
<script type="text/javascript">
  $(document).ready(function () {
    /*
    var defaults = {
          containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
     };
    */

    $().UItoTop({easingType: 'easeOutQuart'});

  });
</script>
<!--end-smooth-scrolling-->
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span
            id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //for bootstrap working -->
<script src="js/bootstrap.js"></script>


<!-- //for bootstrap working -->


</body>
</html>
