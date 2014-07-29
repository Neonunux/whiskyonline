<?php
	session_start();  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
  <?php include("include/header.php"); ?>

	<body>
	   
	<?php
		include("include/menu.php");
		include("bdd.php");
		include_once("class/Categories.class.php");
		
		echo '<div class="titre">';
		echo '<h1>Fiches</h1>';
		echo '</div>';
		
		echo '<div class="texte">';
		if ((isset($_POST['id_whisky'])) AND (is_numeric($_POST['id_whisky'])))
		{ 
		 $fiche = $_POST['id_whisky'];
		 echo 'fiche : ';
		 echo $_POST['id_whisky'];
		}
		if (isset($_GET['fiche']))
		{ 
		 //echo 'fiche : ';
		 //echo $_GET['fiche'];
		 $fiche = $_GET['fiche'];
		 }
		if ((!isset($_POST['id_whisky'])) AND (!isset($_GET['fiche'])))
		{
		echo '       <div id="fichequestion">        
			<form action="fiche.php" method="post">
			<p>
				<input type="entry" name="id_whisky" value="1" />
				<br>
				<input type="submit" value="Valider" />
			</p>
			</form>	
		   </div>';
		}
		echo '<div>';
		if (isset($fiche))
		{
			$instcat = new Categories();

			// VISIBILITÉ PUB -> VIS_PRIV
			$catid = $instcat->getCategories();
			
			include("bdd.php");
			$sql ='SET NAMES UTF8';	
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			$sql='SELECT * FROM raph WHERE id = ' . $fiche;
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			
			while($donnees = mysql_fetch_assoc($req)) // boucle sur lecture de l'entrée
			{ 
					echo '<table id="fiche">';
				if (isset($_SESSION['id']))
				{ // admin
					//echo 't\'es admin ';
					foreach ($catid as $item)
					{			
						if ($item[5])
							echo '<tr><td>' . $item[1] . '</td><td>' . $donnees[$item[0]] . '</td></tr>';
						//print_r($item[3]);
					}			
				}
				else 
				{ // anonyme
					foreach ($catid as $item)
					{
						if ($item[4])
						  echo '<tr><td>' . $item[1] . '</td><td>' . $donnees[$item[0]] . '</td></tr>';
					}
				}
				echo '           </tr>';
			}
			echo '            </table><br /><br />';
			mysql_close();
		}

		/*  if (!is_numeric($_POST['id_whisky']))
		{
			echo 'erreur de saisie';
		} */
		echo '</div>';
		echo '</div>';
	?>
   <!-- Le pied de page -->
	<?php include("include/pied.php"); ?>
	</body>


</html>
 
