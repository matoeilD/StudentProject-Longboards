<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>PaPa Deck - Longboard Skate</title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sprint Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<link rel="stylesheet" type="text/css" href="css/component.css" />
<link rel="stylesheet" href="css/swipebox.css">

<!-- //Custom Theme files -->	
<!-- js -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery-1.11.1.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!-- //js --><!-- swipe box js -->
	<script src="js/jquery.swipebox.min.js"></script> 
	    <script type="text/javascript">
			jQuery(function($) {
				$(".swipebox").swipebox();
			});
	</script>
<!-- //swipe box js -->

    <!--//BALISE JAVA-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript"> // COMMENT OUVRIR UNE BALISE JAVA /*Works only with Chrome*/
      $('#range').on("input", function() {
        $('.output').val(this.value +",000  $" );
      }).trigger("change");
    </script>
<!--web-fonts-->
	<link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
<!--//web-fonts-->
<!-- start-smoth-scrolling-->
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
</head>
<body>
	<!-- main content start-->
     <!--start-home-->
	<div id="home" class="header">
		<div class="header-top">
				<!-- Navbar -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

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

							<a href="https://www.youtube.com/watch?v=KtsAGqo-V18" class="hover-effect">
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
							<a href="espaceprivee.php" class="hover-effect">
								<span>
									<span>ESPACE PRIVEE</span>
									<span>ESPACE</span>
									<span></span>
								</span>
							</a>

                      <?php
                      if(isset($_SESSION['login'])){
                        echo
                          '<a href="logout.php" class="hover-effect">
								<span>
									<span>'.$_SESSION['login'].'</span>
									<span>Se déconnecter</span>
									<span></span>
								</span>
							</a>';
                      }else{
                        echo
                        '<a href="espacemembre.php" class="hover-effect">
								<span>
									<span>Connexion</span>
									<span>Inscription</span>
									<span></span>
								</span>
							</a>';
                      }
                      ?>

                        <a href="bot/indexbot.php" class="hover-effect">
								<span>
									<span>CHATBOT</span>
									<span>CHATBOT</span>
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
				<div class="logo">
						<a href="index.html"><span><img src="images/logosite.png" alt="" class="img-responsive"></span></a>
				</div>
					  <ul class="social-icons">
					        <li><a href="#"> </a></li>
					        <li><a href="#" class="fb"> </a></li>
							<li><a href="#" class="in"> </a></li>
							<li><a href="#" class="dott"> </a></li>
						</ul>
		</div>
				
	    </div>
	  <!--//end-banner-->





  <?php
  $bdd = new PDO('mysql:host=localhost;dbname=snowboard', 'root', '', array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
  function afficherFormulaire () {
    print "<h4 class='filtrebulle'> FILTRES - BULLES <h4>
	
	<form action='' method='POST'>
		<div class='categorie'>
			<label class='categorie' for='type'> CATÉGORIE : </label>
				<input type='radio' name='type' value='cruising' checked> <label for='cruising'> CRUISING </label>
				<input type='radio' name='type' value='slalom'> <label for='slalom'> SLALOM </label>
				<input type='radio' name='type' value='freestyle'> <label for='freestyle'> FREESTYLE </label>
				<input type='radio' name='type' value='dancing'> <label for='dancing'> DANCING </label>
				<input type='radio' name='type' value='slide'> <label for='slide'> SLIDE </label>
	
			<p class='budget'>What is your budget?</p>
				<label for='range'>
				<input type='range' name='range' id='range' min='0' max='300' step='5' value='175'/>
				</label>
				<output for='range' class='output'></output>
		
			   <input class='boutonrechercher' type='submit' value='submit'>
		</div>	
	</form>
	<br>";
    var_dump($_POST);
  }

  afficherFormulaire ();

  if (isset($_POST['type'])) {
    $type = $_POST['type'];
  }

  if (isset($_POST['submit'])) {
    $submit = $_POST['submit'];
  }


  ?><br><?php
    if (isset ($_POST['slalom']) == 'type') {
      $slalom = $_POST["slalom"];
      $sql= "SELECT * FROM longboards WHERE condition = slalom";
    }
    else if (isset ($_POST['freestyle']) == '$type') {
      $freestyle = $_POST["freestyle"];
      $sql= "SELECT * FROM longboards WHERE condition = freestyle";
    }
    else if (isset ($_POST['dancing']) == '$type') {
      $dancing = $_POST["dancing"];
      $sql= "SELECT * FROM longboards WHERE condition = dancing";
    }
    else if (isset ($_POST['slide']) == 'type') {
      $slide = $_POST["slide"];
      $sql= "SELECT * FROM longboards WHERE condition = slide";
    }
    else if (isset ($_POST['cruising']) == 'type') {
      //else if ($type = $cruising)
      $cruising = $_POST["cruising"];
      $sql= "SELECT * FROM longboards WHERE condition = cruising";
    }
    //var_dump($longboards);

    $sql= "SELECT * FROM longboards";
    //$sql= "SELECT * FROM longboards WHERE type = '$Type'";
    foreach ($bdd->query($sql) as $row) {
      $longboards []=$row;
    }



  function genererproduits ($input) {
    //var_dump($tablongboards);
    $bdd = new PDO('mysql:host=localhost;dbname=snowboard', 'root', '', array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
    $sql= "SELECT * FROM ".$input." ORDER BY id DESC LIMIT 4"; //Séléctionner maximum 4 produits à afficher sur la page index pour chaque prduit d'une manière inversée
    foreach ($bdd->query($sql) as $row) {
      $result []=$row;
    }
    foreach ($result as $row) {
      if ($input == "longboards"){
        $html='<div class="content-in"><div class="port effect-1"><div class="image-box"><a href="fiche.php?idProduit='.$row['id'].'"><img src="'.$row['imageproduit'].'" class="img-responsive"></a></div>
                            <div class="text-desc"><h3>'.$row['Nom'].'</h3><p>Longueur : '.$row['Longueur'].'</p><p>Largueur : '.$row['Largeur'].'</p><p>Poids : '.$row['Poids'].'</p><p>Prix : '.$row['Prix'].'</p><h4>'.$row['Type'].'</h4><a href="produitdetail.php?cat='.$input.'&id='.$row['id'].'">commander</a></div></div></div>';
      }

      if ($input == "trucks"){
        $html='<div class="content-in"><div class="port effect-1"><div class="image-box"><a href="produitdetail.php?cat='.$input.'&id='.$row['id'].'"><img src="'.$row['imageproduit'].'" class="img-responsive"></a></div><div class="text-desc">'.'<h3>'.$row['nom'].'</h3><p>Longboard : '.$row['longboard'].'</p><p>Angle : '.$row['angle'].'</p></p><p>Couleur : '.$row['couleur'].'</p><p>Prix : '.$row['prix'].'</p></div></div></div>';
      }

      if ($input == "roues"){
        $html='<div class="content-in"><div class="port effect-1"><div class="image-box"><a href="produitdetail.php?cat='.$input.'&id='.$row['id'].'"><img src="'.$row['imageproduit'].'" class="img-responsive"></a></div><div class="text-desc">'.'<h3>'.$row['nom'].'</h3><p>Size: '.$row['size'].'</p><p>Prix : '.$row['prix'].'</p></div></div></div>';
      }
      print $html;
    }
  }
  ?>



    <div class="content-bottom" id="news">
        <div class="inner-w3 agl">
            <h3 class="title">Nos PLANCHES<span></span></h3>
          <?php genererproduits("longboards"); ?>
        </div>
    </div>

    <div class="content-bottom" id="news" style="clear:both">
        <div class="inner-w3 agl">
            <h3 class="title">Nos TRUCKS<span></span></h3>
          <?php genererproduits("trucks"); ?>
        </div>
    </div>

    <div class="content-bottom" id="news" style="clear:both">
        <div class="inner-w3 agl">
            <h3 class="title">Nos ROUES<span></span></h3>
          <?php genererproduits("roues"); ?>
        </div>
    </div>

 <!--//PHP-->

<!-- //banner-bottom -->
    <!--//team -->
<div id="staff" class="reviews" style='clear:both'>
		   <div class="container">
			<div class="inner-w3">
					<h3 class="title">LAST PICTURE <span></span></h3>
				</div>
			     <div class="staff-section">
				    <div class="col-md-3 staff-grid  animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
				          <div class="view fifth-effect">
							 <a href="images/t1.jpg" class="b-link-stripe b-animate-go  swipebox"><img src="images/t1.jpg" /></a>
							 <div class="mask"></div>
						  </div>
							<h4>Downhill</h4>
							<ul class="social-icons3">
								<li><a href="#"> </a></li>
								<li><a href="#" class="fb"> </a></li>
								<li><a href="#" class="in"> </a></li>
								<li><a href="#" class="dott2"> </a></li>
							</ul>						  
				     </div>
					  <div class="col-md-3 staff-grid animated wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
				         <div class="view fifth-effect">
							 <a href="images/t2.jpg" class="b-link-stripe b-animate-go  swipebox"><img src="images/t2.jpg" /></a>
							 <div class="mask"></div>
						</div>  
						<h4>StarWars</h4>
							<ul class="social-icons3">
								<li><a href="#"> </a></li>
								<li><a href="#" class="fb"> </a></li>
								<li><a href="#" class="in"> </a></li>
								<li><a href="#" class="dott2"> </a></li>
							</ul>						
				     </div>
					 <div class="col-md-3 staff-grid animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
				          <div class="view fifth-effect">
							 <a href="images/t3.jpg" class="b-link-stripe b-animate-go  swipebox"><img src="images/t3.jpg" /></a>
							 <div class="mask"></div>
						  </div>
						  <h4>Penny</h4>
							<ul class="social-icons3">
								<li><a href="#"> </a></li>
								<li><a href="#" class="fb"> </a></li>
								<li><a href="#" class="in"> </a></li>
								<li><a href="#" class="dott2"> </a></li>
							</ul>
						  
				     </div>
					  <div class="col-md-3 staff-grid  animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
				          <div class="view fifth-effect">
							 <a href="images/t4.jpg" class="b-link-stripe b-animate-go  swipebox"><img src="images/t4.jpg" /></a>
							 <div class="mask"></div>
						  </div>
							<h4>Girly</h4>
							<ul class="social-icons3">
								<li><a href="#"> </a></li>
								<li><a href="#" class="fb"> </a></li>
								<li><a href="#" class="in"> </a></li>
								<li><a href="#" class="dott2"> </a></li>
							</ul>						  
				     </div>
					   <div class="clearfix"></div>
				 </div>
	      </div>
	</div>
<!--//team -->
<div class="video">
			<div class="v-w3"><button class="v-b" data-toggle="modal" data-target="#modalvideo">LAST VIDEO : SEPAKUMA<span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span></button></div>
			<!-- Tooltip-Content -->
			<div class="tooltip-content">

				<div class="modal fade features-modal" id="modalvideo" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
							<h4>Papa Deck TV</h4>
								<button type="button" class="close two" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<iframe width="640" height="360" src="https://www.youtube.com/watch?v=KtsAGqo-V18" frameborder="0" allowfullscreen></iframe>
								
						</div>
					</div>
				</div>

			</div>
			<!-- //Tooltip-Content -->
		</div>
		</div>
<!-- footer -->
<div class="footer wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="0.2s">
	<div class="container">
		<div class="footer_top text-center">
		<div class="main-nav">
				  <span class="menu"></span>
				      <div class="top-menu">
							<a href="index.html" class="hover-effect">
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
						<a href="https://www.youtube.com/watch?v=KtsAGqo-V18" class="hover-effect">
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
			                <li><a href="#" class="fb"> </a></li>
							<li><a href="#"> </a></li>
							<li><a href="#" class="in"> </a></li>
							<li><a href="#" class="dott"> </a></li>
						</ul>
		</div>
	</div>
</div>


    <div class="container"
         style="margin-bottom: 100px;">
        <div class
        "row">
        <div class="col-md-12">
            <tr>
                <td colspan="3"><strong>Envoyer un
                        message</strong></td>
            </tr>

            <!--Trois champs sont insérés ensuite pour que les utilisateurs du site puissent remplir ces informations-->
            <form action="receiveform.php"
                  method="post">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputnom">Nom</label>
                        <input type="text" name="nom"
                               id="inputnom"
                               class="form-control"
                               placeholder="Saisir votre nom">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputemail">Email</label>
                        <input type="email" name="email"
                               id="inputemail"
                               class="form-control"
                               placeholder="Saisir votre email">
                    </div>
                </div>

                <!--Les utilisateurs doivent obligatoirement renseigner une adresse e-mail pour pouvoir valider le formulaire grace à l'input type="email" -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label id="textMessage">Message</label>
                        <textarea name="message"
                                  class="form-control"
                                  id="textMessage">
			</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit"
                               name="formValidate"
                               value="envoyer"
                               class="form-control"
                               style="background-color: #f5a02b"
                               ; width="150px">
                    </div>
                </div>
            </form>
        </div>
    </div></div>

		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //for bootstrap working -->
<script src="js/bootstrap.js"></script>


<!-- //for bootstrap working -->


</body>
</html>