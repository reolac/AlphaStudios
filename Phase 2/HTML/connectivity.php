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
	if(!empty($_POST['u']))
	{
		$result = mysqli_query($conn,"SELECT * FROM login where user = '$_POST[u]' AND hashedpass = '$_POST[p]'") or die(mysql_error());
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die(mysql_error());
		if(!empty($row['user']) AND !empty($row['hashedpass']))
		{
			echo "SUCCESSFULLY LOGIN TO USER";
		}
		else
		{
			echo "login failed\n";
		}
	}
}
?>