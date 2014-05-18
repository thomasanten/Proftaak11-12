<?php 
	include('connection.php');
	
	//receive value
	$currNum = $_POST['currentNumber'];

	$result = mysqli_query($db, "SELECT currval('links-count')");          //query
	$array = mysqli_fetch_row($result);                          //fetch result    

	if ($array == $currNum){
		exit(0);
	}   //if they are the same, just exit the page without writing anything
	
	//otherwise, carry on... get the result of your query (for new links)
	//and loop through, echoing return data
	
	$newMsg = mysqli_query($db, "SELECT * FROM chats WHERE id > ".$currNum);
	
	$array = mysqli_fetch_row($newMsg);
	echo json_encode($array);
?>