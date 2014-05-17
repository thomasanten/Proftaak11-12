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
</head>
<body>

<section id="cue">
	<?php
    $result = mysqli_query($db,"SELECT * FROM chats");
    
    while($row = mysqli_fetch_array($result)) {
      echo "<section class='chat'>";
	  echo "<h2>".$row['klantnummer']."</h2>";
	  echo "<h2>".$row['content']."</h2>";
	  echo "<small>".$row['datum']."</small>";
	  echo "</section>";
    }
    
    mysqli_close($db);
    ?> 
</section>
<section id="">

</section>
<section id="chat">

</section>
</body>
</html> 