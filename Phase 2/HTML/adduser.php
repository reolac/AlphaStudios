<?php
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
if(isset($_POST['submit']))
{
	if($_POST['p'] === $_POST['p2'])
	{
		echo "pass same";
		$cost = 10;
		$salt = strtr(base64_encode(mcrypt_create_iv(16,MCRYPT_DEV_URANDOM)), '+', '.');
		$salt = sprintf("$2a$%02d$", $cost) . $salt;
		$hash = crypt($_POST['p'], $salt);
		mysqli_query($conn,"INSERT INTO login (user, hash) VALUES ('$_POST[u]','$hash')");
	}
}
?>