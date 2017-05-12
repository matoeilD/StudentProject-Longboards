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




<form action="contact.php" method="post" enctype="application/x-www-form-urlencoded" name="formulaire">
		<tr> 
			<td colspan="3"><strong>Envoyer un message</strong></td>
		</tr>
		<tr> 
			<td><div align="left">nom :</div></td>
			<td colspan="2"><input type="text" name="nom" size="45" maxlength="100" value="<?php if(isset($_POST["nom"])) echo $_POST["nom"]?>"/>
			</td>
		</tr>
		<tr> 
			<td width="17%"><div align="left">mail :</div></td>
			<td colspan="2"><input type="text" name="mail" size="45" maxlength="100" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"]?>"/>
			</td>
		</tr>
		<tr> 
			<td>
			<div align="left">message : </div></td>
			<td colspan="2"><textarea name="message" cols="50" rows="10" value="<?php if(isset($_POST["message"])) echo $_POST["message"]?>"/></textarea></td>
		</tr>
		<tr> 
		<td></td>
			<td width="41%"><center>
	<input type="submit" name="Submit" value="Envoyer"> </center></td>
		</tr>
	</form>
	</table>
</div>

<!--PHP-->
<?php
 if(isset($_POST["nom"]) && isset($_POST["mail"]))
 {echo "<h2> Message bien reçu! VOTRE NOM:". stripslashes($_POST["nom"])."VOTRE MAIL :" .$_POST["mail"]."MESSAGE :".$_POST["message"]."</h2>"; }
?>