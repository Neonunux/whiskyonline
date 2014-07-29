<?php
class Whisky
{
    private $pseudo;
    private $email;
    private $signature;
    private $actif;
	
 	public function getId()
	{
		include("bdd.php");
		$sql ='SELECT id FROM `whiskyonline`.`raph_categ`';
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		while($don = mysql_fetch_assoc($req))
		{
		$catd[] = $don;
		}
		return $catd;
	}

    public function __construct()
    {
        // Récupérer en base de données les infos du membre
        // SELECT pseudo, email, signature, actif FROM membres WHERE id = ...
         
        // Définir les variables avec les résultats de la base
        $this->pseudo = 'pseudo';
        $this->email = 'email';
        // etc.
    }
     
    public function getPseudo()
    {
        return $this->pseudo;
    }
     
    public function setPseudo($nouveauPseudo)
    {
        $this->pseudo = $nouveauPseudo;
    }
}
?>
