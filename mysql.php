<?php

<?php
// on se connecte à MySQL
$db = mysql_connect('localhost', 'root', '');

// on sélectionne la base
mysql_select_db('whiskyonline',$db);

// on crée la requête SQL
$sql = 'SELECT * FROM raph';

// on envoie la requête
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

// on fait une boucle qui va faire un tour pour chaque enregistrement
while($data = mysql_fetch_assoc($req))
    {
    // on affiche les informations de l'enregistrement en cours
    echo '<b>'.$data['1'].' '.$data['2'].'</b> ('.$data['5'].')';
    echo ' <i>date de naissance : '.$data['6'].'</i><br>';
    }

// on ferme la connexion à mysql
mysql_close();
?> 



/*
ajouter une catégorie :
ALTER TABLE `raph` ADD `roro` BOOLEAN NOT NULL FIRST 
ALTER TABLE `raph` ADD `rara` INT NOT NULL AFTER `pays`
ALTER TABLE `raph` ADD `rere` VARCHAR( 255 ) NOT NULL 

supprimer une catégorie :
ALTER TABLE `raph` DROP `rere`

mise à jour d'une valeur : 
UPDATE `whisky`.`raph_priv_vis` SET `pays_vis` = '0' WHERE `raph_priv_vis`.`id` =1;

renommer une cat :
ALTER TABLE `raph_categ` CHANGE `fich_priv_visib` `fiche_priv_visib` TINYINT( 1 ) NOT NULL 

UPDATE `whisky`.`raph_categ` SET `fiche_priv` = '1',
`fiche_pub` = '1',
`liste_priv` = '1',
`liste_pub` = '1' WHERE `raph_categ`.`id` =7;

effacer une colonne :
UPDATE `raph_categ` SET `fiche_pub_` = ''

*/

?>
