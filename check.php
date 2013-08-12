<?php
if (isset($_POST['checkbox']))
{
	foreach ($_POST['checkbox'] as $checkbox) 
	{
		$arr[]=$checkbox;
		list($type, $visib, $id) = explode("-", $checkbox);
		
		$ro = $type . $visib;
		echo $ro . ' ';
		if ($ro == 'fichepriv')
		  $fichepriv[] = $id;
		
		if ($ro == 'fichepub')
		  $fichepub[] = $id;
		  
		if ($ro == 'listepriv')
		  $listepriv[] = $id;
		  
		if ($ro == 'listepub')
		  $listepub[] = $id;
	}
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
  echo 'tab: ';
	echo '<pre>';
	echo 'fiche priv';
	print_r($fichepriv);
	echo '</pre>';
	echo '<pre>';
	
	echo 'fiche pub';
	print_r($fichepub);
	echo '</pre>';

	echo '<pre>';
	echo 'liste priv';
	print_r($listepriv);
	echo '</pre>';

	echo '<pre>';
	echo 'fiche pub';
	print_r($listepub);
	echo '</pre>';
}
else 
	echo 'pas de changement';
/*
  include("bdd.php");
foreach ($fichepriv as $item)
{
$query = $bdd->prepare('UPDATE `whiskyonline`.`raph_categ` SET `fiche_priv` = '1' WHERE `raph_categ`.`id` = ?');
$query->execute(array('id' => $id));

$data = $query->fetch();
$query->closeCursor();
}
*/


/*
UPDATE `whisky`.`raph_categ` SET `fiche_priv` = '1',
`fiche_pub` = '1',
`liste_priv` = '1',
`liste_pub` = '1' WHERE `raph_categ`.`id` =7;

effacer une colonne :
UPDATE `raph_categ` SET `fiche_pub` = '', 
`fiche_priv` = '',
`liste_pub` = '',
`liste_priv` = ''

*/

?>
