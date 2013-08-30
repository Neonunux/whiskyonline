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
	echo '<h1>Confirmation de suppression</h1>';
	echo '</div>';
	
	echo '<div class="texte">';

	if (isset($_GET['delete']))
	{
		echo 'suppression de "'. $instcat->getName($_GET['delete']).'" effectuée !';
		echo '<br/><br/>retour à la page <a href="administration.php">admin</a>';
		$instcat->ClearCateg($_GET['delete']);
		$instcat->ClearRaph($_GET['delete']);
	}
	
	if (isset($_POST['selection_delete']))
	{
		//echo $_POST['selection_delete'];
		$id = str_replace("val", "", $_POST['selection_delete']);
		echo 'Are you sure you want to effacer the catégorie : '. $_POST['selection_delete'] . 'dans' . $instcat->getName($id) ;
		echo '<br/>Vous allez perdre toutes les informations contenues dans cette catégorie !';
		echo '<form action="check_delete.php?delete='.$id.'" name="catadd" method="post" >
			<input type="submit" value="Confirmation" />
		</form>';
		
	}
	echo '</div>';
	
	?>
	<!-- Le pied de page -->
	<?php include("include/pied.php"); ?>	
	</body>

	
</html>

