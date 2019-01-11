<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>PaPa Deck - Loaded Longboard Skate</title>
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
	<div id="home1" class="header">
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
						<a href="index.html"><img src="images/logosite.png" alt="" class="img-responsive"></span></a>
					 </div></div>
					  <ul class="social-icons">
							<li><a href="#"> </a></li>
							<li><a href="#" class="fb"> </a></li>
							<li><a href="#" class="in"> </a></li>
							<li><a href="#" class="dott"> </a></li>
						</ul>
				</div>
				
	    </div>
	  <!--//end-banner-->
       
<div class="content-bottom" id="news">
	<div class="inner-w3 agl">
					<h3 class="title">Nos Produits<span></span></h3>
				</div>
		


<?php

  $bdd = new PDO('mysql:host=localhost;dbname=snowboard', 'root', '', array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

$sql= "SELECT * FROM longboards";
	foreach ($bdd->query($sql) as $row) {
		$longboards []=$row; 
	}
	//var_dump($longboards);


	function genererproduits ($tablongboards) {
		//var_dump($tablongboards);
		foreach ($tablongboards as $row) {


			$html='<div class="content-in">
            <div class="port effect-1">
                <div class="image-box">';
                   $html.='<a href="fiche.php?idProduit=1">';
                   $html.= '<img src="';
                   $html.=$row['Image'];
                   $html.='" class="img-responsive"></a>
               </div>
                <div class="text-desc">';
			//var_dump($row['Nom']);
		//	var_dump($row['Longueur']);
		//$html='<h1>ttttttttttttttt</h1>';	
		$html.= '<h3>';
		//$html.=$row['Nom'];
		$html.='</h3>';

		$html.= '<p>Longueur : ';
		$html.=$row['Longueur'];
		$html.='</p>';

		$html.= '<p>Largueur : ';
		$html.=$row['Largeur'];
		$html.='</p>';

		$html.= '<p>Poids : ';
		$html.=$row['Poids'];
		$html.='</p>';

		$html.= '<p>Prix : ';
		$html.=$row['Prix'];
		$html.='</p>';

		$html.= '<h4>';
		$html.=$row['Type'];
		$html.='</h4>';

		$html.='
                </div>
            </div>
           </div>
 </div>';
     /*   $html.= '<p>Width : 22,25cm</p>';
		$html.= '<p>Weight : 1,5kg</p>';
		$html.= '<p>Price : 180€</p>';*/
	print $html;	
		}
	}
	genererproduits($longboards);
?>
        
        <div class="clearfix"> </div>
</div>

	<!---->
	
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
								<iframe src="https://www.youtube.com/watch?v=KtsAGqo-V18" frameborder="0" allowfullscreen></iframe>
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
							<a href="index.php" class="hover-effect">
								<span>
									<span>HOME</span>
									<span>HOME</span>
									<span></span>
								</span>
							</a>

							<a href="marques.php" class="hover-effect scroll">
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
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
								<!--end-smooth-scrolling-->
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //for bootstrap working -->
<script src="js/bootstrap.js"></script>


<!-- //for bootstrap working -->


</body>
</html>