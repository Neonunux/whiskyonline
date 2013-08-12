<?php
class Whisky
{
    private $pseudo;
    private $email;
    private $signature;
    private $actif;


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
