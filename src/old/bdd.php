<?php
	switch ($_SERVER['SERVER_NAME'])
	{
	  case "whiskyonline.free.fr":
		$db_host = 'site.sql.free.fr';
		$db_name = 'whiskyonline';
		$db_username = 'whiskyonline';
		$db_password = 'Yd2Hi8kiD';
	  break;
	  case "localhost":
		$db_host = 'localhost';
		$db_name = 'whiskyonline';
		$db_username = 'root';
		$db_password = 'grabioutes4';
		break;
	  case "localhost:9999":
		$db_host = 'localhost';
		$db_name = 'whiskyonline';
		$db_username = 'root';
		$db_password = 'adminadmin';
		break;
	  default:
		$db_host = NULL;
		$db_name = NULL;
		$db_username = NULL;
		$db_password = NULL;
	}

	//echo 'BONJOUR '. $_SERVER['SERVER_NAME'] . '<br/>';

	// on se connecte à MySQL
	$hostdb = mysql_connect($db_host, $db_username, $db_password) or die("Impossib de selectionner la db.");

	// on sélectionne la base
	mysql_select_db($db_name, $hostdb);
?>
