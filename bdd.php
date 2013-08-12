<?php
	// try
	// {
		// $bdd = new PDO('mysql:host=whiskyonline.sql.free.fr;dbname=whiskyonline', 'whiskyonline', 'MDPSQLINTERFACE3');
		// $bdd = new PDO('mysql:host=localhost;dbname=whiskyonline', 'root', '');
	// }
	// catch(Exception $e)
	// {
		// die('Erreur : '.$e->getMessage());
	// }
	
	$host = 'localhost';
	$user = 'root';
	$passwd = '';
	$db = 'whiskyonline';
	echo 'BONJOUR '. $_SERVER['SERVER_NAME'] . 'END' ;
	// on se connecte à MySQL
	$hostdb = mysql_connect($host, $user, $passwd) or die("Cannot select db.");
	 
	// on sélectionne la base
	mysql_select_db($db, $hostdb);

?>
