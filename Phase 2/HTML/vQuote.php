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
    }
    //Connects to the database
	$servername = "localhost:3306";
	$username = "root";
	$password = "bill1995";
	$dbname = "softwarehut";
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	if(mysqli_connect_errno())
	{
		printf("connection failed :%s\n", mysqli_connect_error());
		exit();
	}
	$wr = $_SESSION['WR'];
	$result2 = mysqli_query($conn, "SELECT * FROM WorkOrder WHERE WorkOrderRef = '$wr'");
	$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
	$result = mysqli_query($conn, "SELECT * FROM Quote WHERE qWorkOrder = '$row[WorkOrder_ID]'");
	$row2 = mysqli_fetch_array($result, MYSQLI_ASSOC);
	?>
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
				<?php echo "<input class='Quotes' type='text' name='u' size='100' value='$row2[name]'><br>";?>
				<textarea class ='area' name='textarea' rows='20' cols='101' >
					<?php echo $row2['message']?>
				</textarea>
			</form>
		</div>
	</body>
</html> 