<?php
include ('design.php');

if (!isset($_COOKIE['DESIGN'])) {
	$background = "#badbb7";

}
else {
	if ($_COOKIE['DESIGN'] == "Bleu") {
		$background = "#aac5f4";

	}
	elseif ($_COOKIE['DESIGN'] == "Rose saumon") {
		$background = "#fbbda8";

	}
	elseif ($_COOKIE['DESIGN'] == "Vert") {
		$background = "#badbb7";


	}
	else {
		$background = "#badbb7";

	}
}
echo '<body bgcolor = "',$background,'">';
if (!empty($_POST)) {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	$bdd = new PDO('mysql:host=127.0.0.1;dbname=snowboard', 'root', '');
	
	$reqlog = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo AND mot_de_passe = :mot_de_passe");
               $reqlog->execute(array(':pseudo' => $_POST['login'],':mot_de_passe'=>$_POST['pass']));
               $logexist = $reqlog->rowCount();

	echo $logexist;
	if ($logexist == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: index.php');
		exit();
	}
	elseif ($logexist == 0) {
		$erreur = 'Compte non reconnu.';
	}
	else {
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
	        if (isset($erreur)) echo '<script>alert("'.$erreur.'")</script>';

}
?>

<!DOCTYPE html>
<html>
<center>
		<h1> Connexion à l'espace membre </h1>
<head>


<br /><br />
<center>Ici vous pouvez choisire la couleur de votre espace membre:<br/>
<form action = "send_design.php" method = "post">
<select name = "couleur">
<option>Bleu</option>
<option>Rose saumon</option>
<option>Vert</option>
</select>
<input type = "submit" value = "Modifier">
</form>

</body>
		<hr size="50" color="landscape">
            <h2>* = Champ obligatoire</h2>
    		<form method="POST" action="espacemembre.php">
			Pseudo*: 		<input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login']));?>"><br />
			Mot de passe*:  <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass']));?>"><br />
			<input type="submit" name="submit" value="Se connecter">
			</form>
			<a href="inscription.php">Vous inscrire</a>
			<?php
			if (isset($erreur)) echo '<script>alert('.$erreur.'</script>';
			?>
	</head>
       
<center>
<div class="clearfix"></div>
			<div class="banner-w3-info">
				<div class="logo">
						<a href="index.php"><span><img src="images/logosite.png" alt="" class="img-responsive"></span></a>			
	    </div>
</body>
</html>
