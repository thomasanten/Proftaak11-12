<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="js/jquery.min.js"></script>
<title>TANTEN Group - Chat Applicatie</title>
</head>
<body>

<section id="LoginDiv">
<form method="post" action="pages/UserLogin.php">
	<table>
    	<tr>
        	<td>Email:</td><td><input type="email" name="UserMailLogin"></td>
        </tr>
        <tr>
        	<td>Password:</td><td><input type="password" name="UserPasswordLogin"></td>
        </tr>
        <tr>
        	<td></td><td><input type="submit" value="LOG IN"></td>
        </tr>
        <?php
			if(isset($_GET['error'])){
		?>
        <tr>
        	<td></td><td><span style="color:red;">ERROR LOGIN</span></td>
        </tr>
        <?php
			}
		?>
    </table>
</form>
</section>

<section id="SignUpDiv">
<form method="POST" action="pages/InsertUser.php">
	<table>
    	<tr>
        	<td>Your Name:</td><td><input type="text" name="UserName"></td>
        </tr>
        <tr>
        	<td>Your Email:</td><td><input type="email" name="UserMail"></td>
        </tr>
        <tr>
        	<td>Password:</td><td><input type="password" name="UserPassword"></td>
        </tr>
       <tr>
        	<td></td><td><input type="submit" value="Sign Up"></td>
        </tr>
        <?php
			if(isset($_GET['succes'])){
		?>
        <tr>
        	<td></td><td><span style="color:green;">User Inserted</span></td>
        </tr>
        <?php
			}
		?>
    </table>
</form>
</section>

</body>
</html>