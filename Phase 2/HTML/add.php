<?php
//php Author: Daniel Bentley eeu236
$servername = "localhost:3306";
$username = "root";
$password = "bill1995";
$dbname = "softwarehut";
//Connects to the database
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(mysqli_connect_errno())
{
	printf("connection failed :%s\n", mysqli_connect_error());
	exit();
}
//Inserts into relevant tables in database
if(isset($_POST['submit']))
{
	if($_POST['p'] === $_POST['p2'])
	{
		//encrypts the password
		$cost = 10;
		$salt = strtr(base64_encode(mcrypt_create_iv(16,MCRYPT_DEV_URANDOM)), '+', '.');
		$salt = sprintf("$2a$%02d$", $cost) . $salt;
		$hash = crypt($_POST['p'], $salt);
		$user = $_POST['u'];
		if($stmt = mysqli_prepare($conn, "INSERT INTO login (user , hash) VALUES (?,?)"))
		{
			mysqli_stmt_bind_param($stmt , 'ss',$user, $hash);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
		header('Location: landingpage.php');
	}
}
?>