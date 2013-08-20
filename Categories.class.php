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
				$catid[]=array($data['id'], $data['catnom'], $liste_pub, $liste_priv, $fiche_pub, $fiche_priv);
			}
		// on ferme la connexion à mysql
		mysql_close();
		return $catid;
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
