<?php
//php Author: Daniel Bentley eeu236
ob_start();
session_start();
$servername = "localhost:3306";
$username = "root";
$password = "bill1995";
$dbname = "softwarehut";
$conn = mysqli_connect($servername,$username,$password,$dbname);
//Connects to the database
if(mysqli_connect_errno())
{
	printf("connection failed :%s\n", mysqli_connect_error());
	exit();
}
$wr = $_SESSION['WR'];
$result2 = mysqli_query($conn, "SELECT * FROM WorkOrder WHERE WorkOrderRef = '$wr'");
$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
if($stmt = mysqli_prepare($conn, "INSERT INTO Quote (name,message,qWorkOrder) VALUES(?,?,?)"))
{
	$qWO = $row['WorkOrder_ID'];
	$nam = $_POST['u'];
	$text = $_POST['textarea'];

	mysqli_stmt_bind_param($stmt ,'ssd', $nam, $text, $qWO);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}
header('Location: landingpage.php');
?>