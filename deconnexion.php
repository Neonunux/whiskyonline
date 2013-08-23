<?php
  session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
  <?php include("include/header.php"); ?>
  
   <body>
   
   <?php 
   	$_SESSION = array();
	session_destroy();
   include("include/menu.php");?>
   
   <h1>Déconnexion</h1>
   
   <div class="texte" >

   <?php
	// Suppression des variables de session et de la session

	 
	// Suppression des cookies de connexion automatique
	//setcookie('login', '');
	//setcookie('pass_hache', '');
	
	echo 'Vous avez été déconnecté';
	?>   
	</div>
   </body>
   <!-- Le pied de page -->
	   <?php include("include/pied.php"); ?>

</html>
 
