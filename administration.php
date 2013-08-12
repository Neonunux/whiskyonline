<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	setcookie('pseudo', '', time() + 365*24*3600, null, null, false, true); // On écrit un cookie
	setcookie('passwd', '', time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

	<?php include("include/header.php"); ?>
		
	<body>
	<?php
	  include("bdd.php");
	  include_once("Categories.class.php");
	  
	  $instcat = new Categories();
	  $catid = $instcat->getCategories();
	  
	  // CATEGORIES -> $arr
	  $query = $bdd->query('DESC whiskyonline.raph');
	  while($data = $query->fetch()) // boucle sur lecture de l'entrée
	  {
	 	$text=$data['Field'];
		$arr[]=$text;
	  }
	  if (!isset($_SESSION['id']))
	  { 
	  // Hachage du mot de passe
	  $pass_hache = sha1($_POST['passwd']);
	  $pseudo = $_POST['pseudo'];
	  
	  // Vérification des identifiants
	  $req = $bdd->prepare('SELECT id FROM raph_conf WHERE pseudo = :pseudo AND passwd = :passwd');
	  $req->execute(array(
		  'pseudo' => $pseudo,
		  'passwd' => $pass_hache));
	   
	  $resultat = $req->fetch();
	  /*		if (isset($_POST['passwd']) AND $_POST['passwd'] ==  ) */
	  if (!$resultat)
		  echo 'Mauvais identifiant ou mot de passe !<br/>';
	  else
	  {
		  $_SESSION['id'] = $resultat['id'];
		  $_SESSION['pseudo'] = $pseudo;
		  $_COOKIE['pseudo'] =  $pseudo;
		  $_COOKIE['passwd'] =  $pass_hache;
	  }
	  
	}
	include("include/menu.php");
	 // echo 'mdp :' . $_POST['passwd']. '<br>';
	 // echo 'mdp (sha1):' . sha1($_POST['passwd']). '<br>';
	if (isset($_SESSION['id']))
	{
		echo 'Tu t\'es connecté !<br/>';
		echo 'T\'es administrateur<br/>';
		echo 'C\'est la fête<br/>';
		echo '   
		login :' . $_SESSION['pseudo'] . '<br/>
		Changement du mot de passe : <br/>
		<br/>
		Catégories :<br/>
		Catégories à supprimer :';

		
		echo '<form action="check.php" method="post">';
		echo '<div class="Tableau">';
			// titre 1re ligne
			echo '<p class="legende">';
			echo '<span class="col5" rowspan="2">Listes</span>';
			echo '<span class="col6" rowspan="2">Fiches</span>';
			echo '</p>';
			// titre 2e ligne
			echo '<p class="legende">';
			echo '<span class="col1">Anomymes</span>';
			echo '<span class="col2">' . $_SESSION['pseudo'] . '</span>';
			echo '<span class="col3">Anomymes</span>';
			echo '<span class="col4">' . $_SESSION['pseudo'] . '</span>';
			echo '</p>';			
			
			foreach ($catid as $item)
			{
				echo '<p class="autre">';
				echo '<span class="col1"><input type="checkbox" name="checkbox[]" value="liste-pub-'.$item[0].'"' . $instcat->getAutoCheck($item[2]). '/>'. $item[1] . '</span>';
				echo '<span class="col2"><input type="checkbox" name="checkbox[]" value="liste-priv-'.$item[0].'"' . $instcat->getAutoCheck($item[3]). '/>'. $item[1] . '</span>';
				echo '<span class="col3"><input type="checkbox" name="checkbox[]" value="fiche-pub-'.$item[0].'"' . $instcat->getAutoCheck($item[4]). '/>'. $item[1] . '</span>';
				echo '<span class="col4"><input type="checkbox" name="checkbox[]" value="fiche-priv-'.$item[0].'"' . $instcat->getAutoCheck($item[5]). '/>'. $item[1] . '</span>';
				echo '</p>';
			}
		echo '</div>';
		echo '<input type="submit" value="Valider" />
		</form>
		';

		echo '<select name="categ">';
		echo '<option value="val">--</option>';
		foreach ($catid as $item)
		echo '<option value="val">'. $item[1] . '</option>';
		echo '</select>';
	}
	else
		echo 'pas d"id';
   ?>
	</body>
	<!-- Le pied de page -->
	<?php include("include/pied.php"); ?>
</html>
 
