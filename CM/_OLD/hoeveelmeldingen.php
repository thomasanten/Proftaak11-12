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
			
			// categorie 1 
		
		   $query1 = "select count(*) FROM `pink` WHERE `archief` = 0";
		
            $resultaat1 =  mysql_query ($query1, $db) or die("FOUT: " . mysql_errno() . " - " . mysql_error());
			while( $rij1 = mysql_fetch_array( $resultaat1 ) ) 
			{
				
					echo ($rij1['count(*)']);
						}
						?>