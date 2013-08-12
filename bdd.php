<?php
			try
			{
				$bdd = new PDO('mysql:host=whiskyonline.sql.free.fr;dbname=whiskyonline', 'whiskyonline', 'MDPSQLINTERFACE3');
				//$bdd = new PDO('mysql:host=localhost;dbname=whiskyonline', 'root', '');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
?>
