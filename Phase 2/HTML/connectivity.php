<?php
# to do
# if/else login statement
# actual authentication 
# hiding password/hashing
ob_start();
session_start();
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
		if($stmt = mysqli_prepare($conn, "SELECT hash FROM login WHERE user = ? LIMIT 1"))
		{
			$user = $_POST['u'];
			mysqli_stmt_bind_param($stmt , 's',$user);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $hash);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
		}
		if(!empty($hash))
		{	
			if($hash==crypt($_POST['p'],$hash))
			{
				$_SESSION['loggedin'] = true;
				header('Location: landingpage.php');	
			}
		}
		else
		{
			echo "fail";
			#header('Location: login.html');
		}
	}
}
?>