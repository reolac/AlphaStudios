<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add User</title>
		<link rel="stylesheet" type="text/css" href="../css/Loginpage.css">
	</head>
	<?php 
    ob_start();
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
    {
      #user logged in
    }
    else 
    {
      #header('Location: login.html');
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