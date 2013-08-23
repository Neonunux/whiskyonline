<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
  <?php include("include/header.php"); ?>
  
   <body>
		<h1>Connexion</h1>
		<?php include ("include/menu.php"); ?>
		<div class="texte">
		<form action="administration.php" method="post">
		<p>
			<input type="entry" name="pseudo" value="admin" />
			<br>
			<input type="password" name="passwd" value="admin" />
			<br>
			<input type="checkbox" name="rester" value="false" checked> Rester connecté
			<input type="submit" value="Valider" />
		</p>
		</form>	
		</div>
   </body>
   <!-- Le pied de page -->
	   <?php include("include/pied.php"); ?>

</html>
