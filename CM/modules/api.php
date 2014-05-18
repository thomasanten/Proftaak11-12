<?php 
	include('connection.php');
	
	$lastId = $_GET['lastId'];
	
	$result = mysqli_query($db, "SELECT * FROM chats ORDER BY id DESC LIMIT 1");          //query
	$array = mysqli_fetch_row($result);                          //fetch result   
	$currId = $array[0];
	
	if ($currId == $lastId){
		exit(0);
	}   //if they are the same, just exit the page without writing anything 
	
	echo json_encode($array);
?>