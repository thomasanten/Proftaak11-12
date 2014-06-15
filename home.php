<?php

	session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	$(document).ready(function(){
	
	$("#ChatText").keyup(function(e){
		var ChatText = $("#ChatText").val();
		if(e.keyCode==13){
			$.ajax({
				type:'POST',
				url:'pages/insertMessage.php',
				data:{ChatText:ChatText},
				success:function(){
					$("#ChatMessages").load("pages/DisplayMessages.php");
					$("#ChatText").val("");	
				}
			})
		}
	});
	
	setInterval(function(){
		$("#ChatMessages").load("pages/DisplayMessages.php");
	},1500);

		$("#ChatMessages").load("pages/DisplayMessages.php");
	
	});
</script>
<title>Chat Application Home</title>
</head>
<h2>Welcome <span><?php echo $_SESSION['UserName']; ?></span></h2>
<br><br>
<section id="ChatBig">
	<section id="ChatMessages">
    </section>
    <textarea id="ChatText" name="ChatText"></textarea>
</section>
<body>
</body>
</html>