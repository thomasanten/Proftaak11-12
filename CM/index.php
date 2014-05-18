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
<p>Inkomende chats</p>
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
<p>Prive chats</p>
</section>

<section id="chat">

</section>
<script>
	if (Modernizr.draganddrop) {
		$( "#private" ).text('Sleep een chat om te accepteren');

	var dragSrcEl = null;
	
	function handleDragStart(e) {
	  // Target (this) element is the source node.
	  this.style.opacity = '0.4';
	
	  dragSrcEl = this;
	
	  e.dataTransfer.effectAllowed = 'move';
	  e.dataTransfer.setData('text/html', this.innerHTML);
	}
	
	function handleDragOver(e) {
	  if (e.preventDefault) {
		e.preventDefault(); // Necessary. Allows us to drop.
	  }
	
	  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.
	
	  return false;
	}
	
	function handleDragEnter(e) {
	  // this / e.target is the current hover target.
	  this.classList.add('over');
	}
	
	function handleDragLeave(e) {
	  this.classList.remove('over');  // this / e.target is previous target element.
	}
	
	function handleDrop(e) {
	  // this/e.target is current target element.
	
	  if (e.stopPropagation) {
		e.stopPropagation(); // Stops some browsers from redirecting.
	  }
	
	  // Don't do anything if dropping the same column we're dragging.
	  if (dragSrcEl != this) {
		// Set the source column's HTML to the HTML of the column we dropped on.
		dragSrcEl.innerHTML = this.innerHTML;
		this.innerHTML = e.dataTransfer.getData('text/html');
	  }
	
	  return false;
	}
	
	function handleDragEnd(e) {
	  // this/e.target is the source node.
	
	  [].forEach.call(cols, function (col) {
		col.classList.remove('over');
	  });
	}
	
	var cols = document.querySelectorAll('#cue .chat');
	[].forEach.call(cols, function(col) {
	  col.addEventListener('dragstart', handleDragStart, false);
	  col.addEventListener('dragenter', handleDragEnter, false)
	  col.addEventListener('dragover', handleDragOver, false);
	  col.addEventListener('dragleave', handleDragLeave, false);
	  col.addEventListener('drop', handleDrop, false);
	  col.addEventListener('dragend', handleDragEnd, false);
	});
		
	} else {
		$( "#private" ).text('Klik om een chat te accepteren')
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
		$('#cue').append("<section class='chat' draggable='true'><header><h2>"+vname+"</h2><small>"+vdate+"</small></header><p>"+vmsg+"</p></section>");
	  }
	});
	}, 2000);

</script>
</body>
</html> 