<?php
		// Verbinden met MySQL Database
			$host = "localhost"; //welke server: localhost
			$username = "dbi258366"; //gebruikersnaam
			$password = "kimlinda"; //wachtwoord
			$dbnaam = "dbi258366"; //database naam
			$fout = "FOUT: openen database is mislukt"; //foutmelding 
			
			// Verbinden met Databaseserver
			$db = mysql_connect($host, $username, $password) or die($fout);
			
			//Verbinden met database 
			mysql_select_db($dbnaam, $db) or die($fout);	
		
			$datum = date('d-m-Y');
			$tijd = date('H:i'); 
			$ID = $_POST["ID"];
			// categorie 1 
		echo($ID);
				   $query1 = "UPDATE `pink` SET `archief` = 1 WHERE `id` = $ID";
		$resultaat1 =  mysql_query ($query1, $db) or die("FOUT: " . mysql_errno() . " - " . mysql_error());
						
						?>