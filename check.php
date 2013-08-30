<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	//setcookie('pseudo', '', time() + 365*24*3600, null, null, false, true); // On écrit un cookie
	//setcookie('passwd', '', time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

	<?php include("include/header.php"); ?>

	<body>

	<?php
	include("include/menu.php");

	if (isset($_POST['checkbox']))
	{
		include("bdd.php");
		include_once("class/Categories.class.php");
		
		echo '<div class="titre">';
		echo '<h1>Vérifications</h1>';
		echo '</div>';
		
		$instcat = new Categories();
		$catid = $instcat->getCategories();
		$cid = $instcat->getId();
		
		foreach ($_POST['checkbox'] as $checkbox)
		{
			$arr[]=$checkbox;
			list($type, $visib, $id) = explode("-", $checkbox);

			$ro = $type . $visib;
			//echo $ro . ' ';
			if ($ro == 'fichepriv')
			  $fichepriv[] = $id;

			if ($ro == 'fichepub')
			  $fichepub[] = $id;
	
			if ($ro == 'listepriv')
			  $listepriv[] = $id;

			if ($ro == 'listepub')
			  $listepub[] = $id;
		}
		/*	
		echo '<pre>';
		echo 'id : ';
		print_r($cid);
		echo '</pre>';
		*/
		
		// RESET VISIBILITE MYSQL
		foreach ($cid as $item)
		{
		$sql ='UPDATE `raph_categ` SET 
		`fiche_pub` = \'0\',
		`fiche_priv` = \'0\',
		`liste_pub` = \'0\',
		`liste_priv` = \'0\' 
		WHERE `raph_categ`.`id` =' . $item;
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		}
		
		foreach ($listepriv as $item)
		{
			$sql ='UPDATE `whiskyonline`.`raph_categ` SET `liste_priv` = 1 WHERE `raph_categ`.`id` =' . $item;
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		}
		foreach ($listepub as $item)
		{
			$sql ='UPDATE `whiskyonline`.`raph_categ` SET `liste_pub` = 1 WHERE `raph_categ`.`id` =' . $item;
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		}		
		foreach ($fichepriv as $item)
		{
			$sql ='UPDATE `whiskyonline`.`raph_categ` SET `fiche_priv` = 1 WHERE `raph_categ`.`id` =' . $item;
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		}		
		foreach ($fichepub as $item)
		{
			$sql ='UPDATE `whiskyonline`.`raph_categ` SET `fiche_pub` = 1 WHERE `raph_categ`.`id` =' . $item;
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		}
	}
	else
	{
		echo 'pas de changement';
	}

	
	?>
		<div class="texte">
		Revenir à la page <a href="administration.php">administration</a><br/>
		Revenir à la page <a href="index.php">liste</a> des whisky
	</div>
	<!-- Le pied de page -->
	<?php include("include/pied.php"); ?>
	</body>

</html>
