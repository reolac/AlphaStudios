<?php
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
	if($stmt = mysqli_prepare($conn, "INSERT INTO customer (Address) VALUES (?)"))
		{
			$user = $_POST['nameandAddressofEnquiry'];
			mysqli_stmt_bind_param($stmt , 's',$user);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
	if($stmt = mysqli_prepare($conn, "SELECT Customer_ID FROM customer WHERE Address = ?"))
	{
		$address = $_POST['nameandAddressofEnquiry'];
		mysqli_stmt_bind_param($stmt , 's',$address);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $custid);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
	}
	if($stmt = mysqli_prepare($conn, "INSERT INTO enquiry (ModeOfEnquiry, TimeOfEnquiry, CustomerReqDate, QuotationRef, Reference, CustOrderRef, WorkOrdRef, WorkStatus, Customer)VALUES(?,?,?,?,?,?,?,?,?)"))
	{
		$MoE = $_POST['modeOfEnquiry'];
		$ToE = $_POST['dateandtime'];
		$CrD = $_POST['customerRequirementsAndDeliveryDate'];
		$Quo = $_POST['quotation'];
		$Ref = $_POST['reference'];
		$CoR = $_POST['customerOrderReference'];
		$WoR = $_POST['workOrderReference'];
		$WoE = $_POST['workOrderExecution'];
		mysqli_stmt_bind_param($stmt , 'sssssssss',$MoE,$ToE,$CrD,$Quo,$Ref,$CoR,$WoR,$WoE,$custid);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	$_SESSION['WoR'] = $WoR;
	header('Location: cCheckList.php');
	exit();
}