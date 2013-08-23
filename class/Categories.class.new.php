<?php
class Categories
{
	private $data;
	private $catid;

	public function __construct()
	{
	include("bdd.php");
	//$sql ='SET NAMES UTF8 ; SELECT * FROM `whiskyonline`.`raph_categ` ; ';	
	$sql ='SELECT * FROM `whiskyonline`.`raph_categ` ';	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$this->data = mysql_fetch_assoc($req);
	mysql_close();
	}
	
	public function getCategories()
	{
		while($this->data)
			{
				// on affiche les informations de l'enregistrement en cours
				$liste_pub=$this->data['liste_pub']; 		// 2
				$liste_priv=$this->data['liste_priv']; 	// 3
				$fiche_pub=$this->data['fiche_pub']; 		// 4
				$fiche_priv=$this->data['fiche_priv']; 	// 5 
				$catnom=$this->data['catnom'];
				$id=$this->data['id'];
				$this->catid[]=array($id, $catnom, $liste_pub, $liste_priv, $fiche_pub, $fiche_priv);
			}
		// on ferme la connexion à mysql
		
		return $this->catid;
	}
	
	/*
 	public function getId()
	{
		$sql ='SELECT * FROM `whiskyonline`.`raph_categ` WHERE 1';
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($data = mysql_fetch_assoc($req))
		{
			// on affiche les informations de l'enregistrement en cours
			$catd[]=$data['id'];
		}
		mysql_close();
		return $catd;
	}
	*/	
	
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
