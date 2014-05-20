<?php
	include('modules/connection.php');
?> 
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>TANTEN - module</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/screen.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="js/modernizr.min.js" type="text/javascript"></script>
</head>
<body>

<section id="cue">
<h1>Inkomende chats</h1>
	<?php
    $result = mysqli_query($db,"SELECT * FROM chats");
	$lastId = mysqli_query($db,"SELECT MAX(id) FROM chats");
	$lastId = mysqli_fetch_array($lastId);
    
    while($row = mysqli_fetch_array($result)) {
      echo "<section class='chat' id='".$row['id']."' draggable='true'>";
	  echo "<header><h2>".$row['custId']."</h2>";
	  echo "<small>".$row['date']."</small></header>";	  
	  echo "<p>".$row['msg']."</p>";
	  echo "</section>";
    }
    
    mysqli_close($db);
    ?> 
</section>
<section id="private">
<h1>Geaccepteerde chats</h1>
</section>

<section id="chat">

</section>
<script src="http://html5demos.com/h5utils.js"></script>
<script>

	$(this).click(function() {
		$(this).appendTo("#private");
	});
	
	if (Modernizr.draganddrop) {
		//$( "#private h1" ).text('Sleep een chat om te accepteren');
	
		
	} else {
		//$( "#private h1" ).text('Klik om een chat te accepteren')
	}

	setInterval(	
	function () 
	{
	$.ajax({                                      
	  url: '../CM/modules/api.php',                  //the script to call to get data          
	  data: '',								//you can insert url argumnets here to pass to api.php
										   //for example "id=5&parent=6"
	  dataType: 'json',                //data format      
	  success: function(data)          //on recieve of reply
	  {
		var id = data[0];				//get id
		var vname = data[1];			//get name
		var vmsg = data[2];			//get msg
		var vdate = data[3];			//get date
		$('#cue').append("<section class='chat' id='"+id+"' draggable='true'><header><h2>"+vname+"</h2><small>"+vdate+"</small></header><p>"+vmsg+"</p></section>");
	  }
	});
	}, 2000);

</script>
</body>
</html> 