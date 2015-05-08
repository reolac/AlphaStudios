<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sign-In</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/Quotesheet.css">
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
	 	<div id='cssmenu'>
		    <ul>
		        <li class='active'><a href='#'><span>Create</span></a></li>
		        <li class='last'><a href='#'><span>Home</span></a></li>
		        <li><a href='#'><span>View</span></a></li>
		        <li class='last'><a href='#'><span>Logout</span></a></li>
		      <li class='last'><a href='#'><span>Help</span></a></li>
		    </ul>
	  	</div>
		<div id="loginMain">
			<h1>Quote Sheet</h1>
			<form id="loginDetails" method="post"action="quoteInsert.php">
				<input class="Quotes" type="text" name="u" placeholder="Please write here" size="100"><br>
				<textarea class ="area" name="textarea"rows="20" cols="101">
				</textarea>
				<input type="submit" id="sendCheckList" name="submit" class="createButton"></input>
			</form>
		</div>
	</body>
</html> 