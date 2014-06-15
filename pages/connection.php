<?php

	$host 	= 'localhost';	
	$user 	= 'root';
	$pass	= '';
	$dbname	= 'monitor_ikea';
	try{
			$bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}catch(PDOException $e){
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}


?>