<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	//setcookie('pseudo', '', time() + 365*24*3600, null, null, false, true); // On écrit un cookie
	//setcookie('passwd', '', time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

	<?php include("include/header.php"); ?>
	<script language="Javascript">
	<!--
	function selectAll(theField) {
	var tempval=eval("document."+theField)
	tempval.focus()
	tempval.select()
	}
	//-->
	</script>
	
	<body>
	
	<?php
	  include("bdd.php");
	  include_once("class/Categories.class.php");
	  
	  $instcat = new Categories();
	  $catid = $instcat->getCategories();
	  
	  // CATEGORIES -> $arr
		include("bdd.php");
		$sql ='SET NAMES UTF8';	
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

	if (!isset($_SESSION['id']))
	{ 
		include("bdd.php");
		$sql ='SET NAMES UTF8';	
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

	// Hachage du mot de passe
	  $pass_hache = sha1($_POST['passwd']);
	  $pseudo = $_POST['pseudo'];
	  
	  // Vérification des identifiants
	  $req = mysql_query('SELECT id FROM raph_conf WHERE pseudo = \'' . $pseudo . '\' AND passwd = \'' . $pass_hache. '\'') or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	   
	  $resultat = mysql_fetch_assoc($req);
	  /*		if (isset($_POST['passwd']) AND $_POST['passwd'] ==  ) */
	  if (!$resultat)
		  echo 'Mauvais identifiant ou mot de passe !<br/>';
	  else
	  {
		  $_SESSION['id'] = $resultat['id'];
		  $_SESSION['pseudo'] = $pseudo;
		  $_SESSION['passwd'] = $pass_hache;
		  //$_COOKIE['pseudo'] =  $pseudo;
		  //$_COOKIE['passwd'] =  $pass_hache;
	  }
	}
	include("include/menu.php");
	 // echo 'mdp :' . $_POST['passwd']. '<br>';
	 // echo 'mdp (sha1):' . sha1($_POST['passwd']). '<br>';
	if (isset($_SESSION['id']))
	{
		echo '<div class="titre">';
		echo '<h1>Administration</h1>';
		echo '</div>';
		
		echo '<div class="texte">';
		echo '
		<div class="essai">
			<p>
			<form name="adminom" >
			<span>login : <input type="entry" name="pseudo" onfocus="selectAll(\'adminom.pseudo\')" value="'.$_SESSION['pseudo'].'" /><input type="submit" value="Changer" /></form></span><br/>
			<form name="adminpswd" >
			<span>Changement du mot de passe : <input type="password" name="passwd" onfocus="selectAll(\'adminpswd.passwd\')" value="'. $_SESSION['pseudo'].'" /></span><br/>
			<span>Confirmation du mot de passe : <input type="password" name="passwd" onfocus="selectAll(\'adminpswd.passwd\')" value="'. $_SESSION['pseudo'].'" /><input type="submit" value="Changer" /></span><br/>
			</p>
		</div>
		<br/>
		Visibilités des catégories :<br/>';


		
		echo '<form action="check.php" method="post">';
		echo '<table class="Tableau">';
			// titre 1re ligne
			echo '<tr class="legende">';
			echo '<th class="col5" colspan="2">Listes</th>';
			echo '<th class="col5" colspan="2">Fiches</th>';
			echo '</tr>';
			// titre 2e ligne
			echo '<tr class="legende">';
			echo '<th class="col1">Anomymes</th>';
			echo '<th class="col2">' . $_SESSION['pseudo'] . '</th>';
			echo '<th class="col3">Anomymes</th>';
			echo '<th class="col4">' . $_SESSION['pseudo'] . '</th>';
			echo '</tr>';			
			
			foreach ($catid as $item)
			{
				echo '<tr class="autre">';
				echo '<td class="col1"><input type="checkbox" name="checkbox[]" value="liste-pub-'.$item[0].'"' . $instcat->getAutoCheck($item[2]). '/>'. $item[1] . '</td>';
				echo '<td class="col2"><input type="checkbox" name="checkbox[]" value="liste-priv-'.$item[0].'"' . $instcat->getAutoCheck($item[3]). '/>'. $item[1] . '</td>';
				echo '<td class="col3"><input type="checkbox" name="checkbox[]" value="fiche-pub-'.$item[0].'"' . $instcat->getAutoCheck($item[4]). '/>'. $item[1] . '</td>';
				echo '<td class="col4"><input type="checkbox" name="checkbox[]" value="fiche-priv-'.$item[0].'"' . $instcat->getAutoCheck($item[5]). '/>'. $item[1] . '</td>';
				echo '</tr>';
			}
		echo '</table>';	
		?>
		
		<input type="submit" value="Valider" />
		</form>
		<br/>
		Catégories à ajouter :
		<form action="check_cat.php" name="catadd" method="post" >
		<div class="catdelete ">
				<span>
					<select name="categ"> 
						<option value="chaine">Chaîne de caractères</option>
						<option value="entier">Entier</option>
						<option value="decimal">Décimal</option>
						<option value="date">Date</option>
					</select>
			</span>
			<span>
			
				<input type="entry" name="catnom" onfocus="selectAll('catadd.catnom')" value="Nom de la catégorie" />
				<input type="submit" value="Ajouter" />
			</span>
		</div>
		</form>
		
		Catégories à supprimer :
		<form action="check_delete.php" method="post" >
			<div class="catdelete ">
				<select name="selection_delete"> 
				<option value="val">--</option>
				<?php
				foreach ($catid as $item)
				echo '<option value="val'.$item[0].'">'. $item[1] . '</option>';
				echo '</select>
				<input type="submit" value="Supprimer" />
			</div>
		</form>';
	}
	else
		echo 'pas d"id';
	echo '</div>';
   ?>
	</body>
	<!-- Le pied de page -->
	<?php include("include/pied.php"); ?>
</html>
 
