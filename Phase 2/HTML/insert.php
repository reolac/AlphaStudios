<?php
//php Author: Daniel Bentley eeu236
ob_start();
session_start();
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
	if($stmt = mysqli_prepare($conn, "INSERT INTO WorkOrder(WorkOrderRef, WorkStatus) VALUES(?,?)"))
	{
		$WoR = $_POST['workOrderReference'];
		$WoE = $_POST['workOrderExecution'];
		mysqli_stmt_bind_param($stmt, 'ss', $WoR, $WoE);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	if($stmt = mysqli_prepare($conn, "SELECT WorkOrder_ID FROM WorkOrder WHERE WorkOrderRef = ?"))
	{
		mysqli_stmt_bind_param($stmt,'s',$WoR);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $workid);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
		

	}
	if($stmt = mysqli_prepare($conn, "INSERT INTO enquiry (ModeOfEnquiry, TimeOfEnquiry, CustomerReqDate, QuotationRef, Reference, CustOrderRef, Customer, eWorkOrd, QuoteReview)VALUES(?,?,?,?,?,?,?,?,?)"))
	{
		$MoE = $_POST['modeOfEnquiry'];
		$ToE = $_POST['dateandtime'];
		$CrD = $_POST['customerRequirementsAndDeliveryDate'];
		$Quo = $_POST['quotation'];
		$Ref = $_POST['reference'];
		$CoR = $_POST['customerOrderReference'];
		$QA = $_POST['orderAcceptance'];
		mysqli_stmt_bind_param($stmt , 'ssssssdds',$MoE,$ToE,$CrD,$Quo,$Ref,$CoR,$custid,$workid,$QA);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	$_SESSION['WoR'] = $WoR;
	header('Location: cCheckList.php');
	exit();
}