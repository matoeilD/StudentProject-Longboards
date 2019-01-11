<?php
include 'design.php';

$expire=365*24*3600;

setcookie ("DESIGN", $_POST['couleur'], time() + $expire);
?>
<html>
<head>
</head>

<?
echo '<body bgcolor = "',$background,'">
<br /><br />
<center>	<h1> veuillez cliquer sur le logo - PaPa Deck - pour voir la modification de couleur  </h1>
<?
echo $_POST['couleur'];
?>
<br /><br />
<form action = "espacemembre.php" method = "post">
</form>
<center>
<div class="clearfix"></div>
			<div class="banner-w3-info">
				<div class="logo">
						<a href="espacemembre.php"><span><img src="images/logosite.png" alt="" class="img-responsive"></span></a>
				
				
	    </div>
	  <!--//end-banner-->
</html>