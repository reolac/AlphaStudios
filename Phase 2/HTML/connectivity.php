<?php
# to do
# if/else login statement
# actual authentication 
# hiding password/hashing
ob_start();
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
		$result = mysqli_query($conn,"SELECT * FROM login where user = '$_POST[u]' LIMIT 1") or die(mysql_error());
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die(mysql_error());
		if(!empty($row['hash']))
		{	
			if($row['hash']==crypt($_POST['p'],$row['hash']))
			{
				header('Location: cHome.html');	
			}
		}
		else
		{
			header('Location: login.html');
		}
	}
}
?>