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
			echo("<div class='column1'>");		
		   $query1 = "SELECT * FROM `pink` WHERE `categorie` = 1 AND `archief` = 1 ORDER BY `id` DESC";
		
            $resultaat1 =  mysql_query ($query1, $db) or die("FOUT: " . mysql_errno() . " - " . mysql_error());
			while( $rij1 = mysql_fetch_array( $resultaat1 ) ) 
			{
				
					echo (" <div class='portlet' id='$rij1[id]'>

					 <div class='portlet-header'>$rij1[titel]</div>
					<div class='portlet-content'>$rij1[content]</div>
					<div class='bar'><span class=prio$rij1[prioriteit]>");
			if ($rij1['prioriteit'] == 1){
				$uitroep = "!!!";
			}
			if ($rij1['prioriteit'] == 2){
				$uitroep = "!!";
			}	
			if ($rij1['prioriteit'] == 3){
				$uitroep = "!";
			}				
			if ($datum == $rij1["datum"])
			{
				$datetime1 = new DateTime();
				$datetime2 = new DateTime($rij1["nu"]);
				$interval = $datetime1->diff($datetime2);
				$hoelanggeleden = $interval->format('%h uur en %i minuten geleden');				
				echo "$uitroep</span><span class='zetterug'>Terugzetten</span>";
				
				echo "<span class='tijd'>$hoelanggeleden</span><span class='delete'></span></div>";	
			}
			else
			{
				echo "$uitroep</span><span class='zetterug'>Terugzetten</span>";
				
				echo "<span class='tijd'>Gisteren om $rij1[tijd]</span><span class='delete'></span></div>";
			}
			echo("</div>");
			}
			
			echo("</div>");
						// categorie 2 
			echo("<div class='column2'>");		
		   $query1 = "SELECT * FROM `pink` WHERE `categorie` = 2 AND `archief` = 1 ORDER BY `id` DESC";
		
            $resultaat1 =  mysql_query ($query1, $db) or die("FOUT: " . mysql_errno() . " - " . mysql_error());
			while( $rij1 = mysql_fetch_array( $resultaat1 ) ) 
			{
				
					echo (" <div class='portlet' id='$rij1[id]'>

					 <div class='portlet-header'>$rij1[titel]</div>
					<div class='portlet-content'>$rij1[content]</div>
					<div class='bar'><span class=prio$rij1[prioriteit]>");
			if ($rij1['prioriteit'] == 1){
				$uitroep = "!!!";
			}
			if ($rij1['prioriteit'] == 2){
				$uitroep = "!!";
			}	
			if ($rij1['prioriteit'] == 3){
				$uitroep = "!";
			}				
			if ($datum == $rij1["datum"])
			{
				$datetime1 = new DateTime();
				$datetime2 = new DateTime($rij1["nu"]);
				$interval = $datetime1->diff($datetime2);
				$hoelanggeleden = $interval->format('%h uur en %i minuten geleden');				
				echo "$uitroep</span><span class='zetterug'>Terugzetten</span>";
				
				echo "<span class='tijd'>$hoelanggeleden</span><span class='delete'></span></div>";	
			}
			else
			{
				echo "$uitroep</span><span class='zetterug'>Terugzetten</span>";
				
				echo "<span class='tijd'>Gisteren om $rij1[tijd]</span><span class='delete'></span></div>";
			}
			echo("</div>");
			}
			
			echo("</div>");			
			
			// categorie 2 
			echo("<div class='column3'>");		
		   $query1 = "SELECT * FROM `pink` WHERE `categorie` = 3 AND `archief` = 1 ORDER BY `id` DESC";
		
            $resultaat1 =  mysql_query ($query1, $db) or die("FOUT: " . mysql_errno() . " - " . mysql_error());
			while( $rij1 = mysql_fetch_array( $resultaat1 ) ) 
			{
				
					echo (" <div class='portlet' id='$rij1[id]'>

					 <div class='portlet-header'>$rij1[titel]</div>
					<div class='portlet-content'>$rij1[content]</div>
					<div class='bar'><span class=prio$rij1[prioriteit]>");
			if ($rij1['prioriteit'] == 1){
				$uitroep = "!!!";
			}
			if ($rij1['prioriteit'] == 2){
				$uitroep = "!!";
			}	
			if ($rij1['prioriteit'] == 3){
				$uitroep = "!";
			}				
			if ($datum == $rij1["datum"])
			{
				$datetime1 = new DateTime();
				$datetime2 = new DateTime($rij1["nu"]);
				$interval = $datetime1->diff($datetime2);
				$hoelanggeleden = $interval->format('%h uur en %i minuten geleden');				
				echo "$uitroep</span><span class='zetterug'>Terugzetten</span>";
				
				echo "<span class='tijd'>$hoelanggeleden</span><span class='delete'></span></div>";	
			}
			else
			{
				echo "$uitroep</span><span class='zetterug'>Terugzetten</span>";
				
				echo "<span class='tijd'>Gisteren om $rij1[tijd]</span><span class='delete'></span></div>";
			}
			echo("</div>");
			}
			
			echo("</div>");	
			// categorie 2 
			echo("<div class='column4'>");		
		   $query1 = "SELECT * FROM `pink` WHERE `categorie` = 4 AND `archief` = 1 ORDER BY `id` DESC";
		
            $resultaat1 =  mysql_query ($query1, $db) or die("FOUT: " . mysql_errno() . " - " . mysql_error());
			while( $rij1 = mysql_fetch_array( $resultaat1 ) ) 
			{
				
					echo (" <div class='portlet' id='$rij1[id]'>

					 <div class='portlet-header'>$rij1[titel]</div>
					<div class='portlet-content'>$rij1[content]</div>
					<div class='bar'><span class=prio$rij1[prioriteit]>");
			if ($rij1['prioriteit'] == 1){
				$uitroep = "!!!";
			}
			if ($rij1['prioriteit'] == 2){
				$uitroep = "!!";
			}	
			if ($rij1['prioriteit'] == 3){
				$uitroep = "!";
			}				
			if ($datum == $rij1["datum"])
			{
				$datetime1 = new DateTime();
				$datetime2 = new DateTime($rij1["nu"]);
				$interval = $datetime1->diff($datetime2);
				$hoelanggeleden = $interval->format('%h uur en %i minuten geleden');				
				echo "$uitroep</span><span class='zetterug'>Terugzetten</span>";
				
				echo "<span class='tijd'>$hoelanggeleden</span><span class='delete'></span></div>";	
			}
			else
			{
				echo "$uitroep</span><span class='zetterug'>Terugzetten</span>";
				
				echo "<span class='tijd'>Gisteren om $rij1[tijd]</span><span class='delete'></span></div>";
			}
			echo("</div>");
			}
			
			echo("</div>");	?>
