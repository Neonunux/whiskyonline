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
	?>
	
	</body>
	<!-- Le pied de page -->
	<?php include("include/pied.php"); ?>

</html>
 
