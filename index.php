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
	include_once("Categories.class.php");
	$instcat = new Categories();
	
	echo '<h1>Site des Whisky de Raph</h1>';

	if (isset($_GET['fiche']))
	{ 
	 echo 'fiche : ';
	 echo $_GET['fiche'];
	 $fiche = $_GET['fiche'];
	 } 
	else
	$fiche = 1;

	

	// VISIBILITÉ PUB -> VIS_PRIV
	$catid = $instcat->getCategories();

	// CONSTRUCTION DU TABLEAU
	// TITRES
	echo '<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>';
	if (isset($_SESSION['id']))
	{
		foreach ($catid as $item)
			if ($item[3])
				echo '<th>' . $item[1] . '</th>';
	}	
	else
	{
		foreach ($catid as $item)
			if ($item[2])
				echo '<th>' . $item[1] . '</th>';
	}
	echo '</tr>';
	
	// CONTENU
	include("bdd.php");
	$sql ='SET NAMES UTF8';	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$sql='SELECT * FROM raph';
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($donnees = mysql_fetch_assoc($req)) // boucle sur lecture de l'entrée
	{
		echo '           <tr>';
		if (isset($_SESSION['id']))
		{
			foreach ($catid as $item)
			{			
				if ($item[3])
					echo '<td><a href="fiche.php?fiche=' . $donnees['id'] . '">' . $donnees[$item[0]] . '</a></td>';
			}				
		}
		else
		{
			foreach ($catid as $item)
			{
				if ($item[2])
				  {
				  echo '<td><a href="fiche.php?fiche=' . $donnees['id'] . '">' . $donnees[$item[0]] . '</a></td>';
				  }
				  print_r($item[4]);
			}
		}
		echo '           </tr>';
	}
	echo '            </table><br /><br />';
	mysql_close();
	?>
	
	</body>
	<!-- Le pied de page -->
	<?php include("include/pied.php"); ?>

</html>
 
