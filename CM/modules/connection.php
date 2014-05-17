<?php
	// Database gegevens
	$db_host        = 'localhost';
	$db_user        = 'monitor_app';
	$db_pass        = 'Tanten2014';
	$db_database    = 'monitor_ikea'; 
	$fout = "FOUT: openen database is mislukt"; 
	
	//Verbinden met database 	
	$db = new mysqli($db_host, $db_user, $db_pass, $db_database);

	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>