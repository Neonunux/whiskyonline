<?php
  // On démarre la session AVANT d'écrire du code HTML
  session_start();

  // On s'amuse à créer quelques variables de session dans $_SESSION
  /*$_SESSION['prenom'] = 'Jean';*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<?php include("include/header.php"); ?>
	
	<body>

	<?php
	include("include/menu.php");
	include("class/Categories.class.php");
	include_once("bdd.php");
	
	$instcat= new Categories();
	
	echo '<div class="titre">';
	echo '<h1>CONFIRMATION DE CRÉATION</h1>';
	echo '</div>';
	
	echo '<div class="texte">';
	
	
	//On créé d'abord raph_categ
	$instcat->createRaphCateg($_POST['catnom']);
	
	// Ensuite on récupère l'id qui n'est pas forcément n+1 s'il y a eu des suppressions avant
	$new=$instcat->GetLastItem();

	/* puis :*/	
	$instcat->createRaph($_POST['categ'], $new);
	
	echo $_POST['categ'];
	echo '<br/>';
	echo $_POST['catnom'];
	echo '<br/>';
	
	
	// d'abord création puis récupération de l'indice sinon il peut y avoir des bugs sur l'indice ramené depuis MySQL
	
	echo 'Création de "'.$_POST['catnom'].'" effectuée en position '.$new.' !';
	echo '<br/><br/>retour à la page <a href="administration.php">admin</a>';
	
	echo '</div>';
	
	?>
	<!-- Le pied de page -->
	<?php include("include/pied.php"); ?>	
	</body>

	
</html>

