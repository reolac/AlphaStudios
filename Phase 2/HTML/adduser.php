<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add User</title>
		<link rel="stylesheet" type="text/css" href="../css/Loginpage.css">
	</head>
	<?php
	//php Author: Daniel Bentley eeu236 
    ob_start();
    session_start();
    //redirects if the user isn't logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
    {
      #user logged in
    }
    else 
    {
      header('Location: login.html');
    }?>
	<body>
		<div class="companyHeader">
			<img src="../img/GELogo.jpg"> 
		</div>
		
		<div id="loginMain">
			<h1>Add User</h1>
			<form id="loginDetails" method="POST" action="add.php">
				<input class="usernameBox" type="text" name="u" placeholder="Username"><br>
				<input class="passwordBox" type="password" name="p" placeholder="Password"><br>
				<input class="passwordBox" type="password" name="p2" placeholder="Re-Enter Password"><br>
				<input id="button" type="submit" name="submit" value="Add User">
			</form>
		</div>
	</body>
</html> 