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
		switch ($_SERVER['SERVER_NAME']) 
	{
	  case "whiskyonline.free.fr":
		$db_host = 'sql.free.fr';
		$db_name = 'whiskyonline';
		$db_username = 'whiskyonline';
		$db_password = 'MDPSQLINTERFACE3';
	  break;
	  case "localhost":
		$db_host = 'localhost';
		$db_name = 'whiskyonline';
		$db_username = 'root';
		$db_password = '';
		break;
	  default:
		$db_host = NULL;
		$db_name = NULL;
		$db_username = NULL;
		$db_password = NULL;
	}
	
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
