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
		include("bdd.php");
		
		$query = $bdd->query('SET NAMES UTF8');
		$query = $bdd->query('SELECT * FROM whiskyonline.raph_categ ');
		while($data = $query->fetch()) 
		{
			$liste_pub=$data['liste_pub']; 		// 2
			$liste_priv=$data['liste_priv']; 	// 3
			$fiche_pub=$data['fiche_pub']; 		// 4
			$fiche_priv=$data['fiche_priv']; 	// 5 
			$catid[]=array($data['id'], $data['catnom'], $liste_pub, $liste_priv, $fiche_pub, $fiche_priv);
		}
		$query->closeCursor();
		return $catid;
	}
	
    public function getFichePrivateVisibility()
    {
        include("bdd.php");
        $query = $bdd->query('SELECT fiche_priv_visib FROM whiskyonline.raph_categ');
        while ($data = $query->fetch()) // boucle sur lecture de l'entrée
        {
			    $arr_vis[]= $data;
		    }
		    $query->closeCursor();
		    return $arr_vis;		
	}
	
    public function getFichePublicVisibility()
    {
        include("bdd.php");
        $query = $bdd->query('SELECT fiche_pub_visib FROM whiskyonline.raph_categ');
        while ($data = $query->fetch()) // boucle sur lecture de l'entrée
        {
			$arr_vis[]= $data;
		}
		$query->closeCursor();
		return $arr_vis;
	}    
    public function getListePrivateVisibility()
    {
        include("bdd.php");
        $query = $bdd->query('SELECT liste_priv_visib FROM raph_categ');
        while ($data = $query->fetch()) // boucle sur lecture de l'entrée
        {
			$arr_vis[]= $data;
		}
		$query->closeCursor();
		return $arr_vis;		
	}
    public function getListePublicVisibility()
    {
        include("bdd.php");
        $query = $bdd->query('SELECT liste_pub_visib FROM whiskyonline.raph_categ');
        while ($data = $query->fetch()) // boucle sur lecture de l'entrée
        {
			$arr_vis[]= $data;
		}
		$query->closeCursor();
		return $arr_vis;
	}
	
	public function getAutoCheck($check)
    {
		if ($check)
		{
		$strg = 'checked';
		return $strg;
		}
	}
}
?>
