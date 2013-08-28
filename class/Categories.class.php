<?php
class Categories
{
    private $pseudo;
    private $email;
    private $signature;
    private $actif;

    public function getPseudo()
    {
        return $this->pseudo;
    }
     
    public function setPseudo($nouveauPseudo)
    {
        $this->pseudo = $nouveauPseudo;
    }
	
	public function getCategories()
	{
		include_once("bdd.php");
			
		$sql ='SET NAMES UTF8';	
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		
		$sql ='SELECT * FROM whiskyonline.raph_categ ';	
		// on envoie la requête
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

		// on fait une boucle qui va faire un tour pour chaque enregistrement
		while($data = mysql_fetch_assoc($req))
			{
				// on affiche les informations de l'enregistrement en cours
				$liste_pub=$data['liste_pub']; 		// 2
				$liste_priv=$data['liste_priv']; 	// 3
				$fiche_pub=$data['fiche_pub']; 		// 4
				$fiche_priv=$data['fiche_priv']; 	// 5 
				$catnom=$data['catnom'];
				$id=$data['id'];
				$catid[]=array($id, $catnom, $liste_pub, $liste_priv, $fiche_pub, $fiche_priv);
			}
		// on ferme la connexion à mysql
		//mysql_close();
		return $catid;
	}

	 	public function GetLastItem($id)
	{
		$sql ='SELECT count(*) FROM `raph_categ` WHERE 1' . $id ;
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$count=mysql_fetch_assoc($req);
		return $count;
	}

	
	 	public function ClearCateg($id)
	{
		$sql ='DELETE FROM `whiskyonline`.`raph_categ` WHERE `raph_categ`.`id` = ' . $id ;
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	}
	
	public function ClearRaph($id)
	{
		$sql ='ALTER TABLE `whiskyonline`.`raph` DROP `' . $id . '`';
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	}
	
 	
	public function getId()
	{
		$sql ='SELECT * FROM `whiskyonline`.`raph_categ`';
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($don = mysql_fetch_assoc($req))
			$catd[]=$don['id'];

		return $catd;
	}

	public function getName($id)
	{
		$sql ='SELECT catnom FROM `whiskyonline`.`raph_categ` WHERE id='.$id;
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		$don = mysql_fetch_assoc($req);
		$catd=$don['catnom'];

		return $catd;
	}
	
	public function getAutoCheck($check)
    {
		if ($check)
		{
		$strg = 'checked';
		return $strg;
		}
	}
//	public function setPriority($priority)
//    {


}
?>
