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
	$WoR = $_SESSION['WoR'];
	if($stmt = mysqli_prepare($conn, "SELECT WorkOrder_ID FROM WorkOrder WHERE WorkOrderRef = ?"))
	{
		mysqli_stmt_bind_param($stmt,'s',$WoR);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $workid);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
	}
	echo $workid;
	if($stmt = mysqli_prepare($conn, "INSERT INTO checklist (DrawRefNum, CostingSheet, Quotation, CustPurOrdNum, PurOrdNum, DelNotNum, InvNum, RejNum, TestCertNum, LPTest, PhotoRefNum, jWorkOrd)
	VALUES(?,?,?,?,?,?,?,?,?,?,?,?)"))
	{
		$DrF = $_POST['drawingReferenceNumber'];
		$CS = $_POST['costingSheet'];
		$Quo = $_POST['quotation'];
		$CpoN = $_POST['customPurchaseOrderNumber'];
		$PoN = $_POST['purchaseOrderNumber'];
		$DnN = $_POST['deliveryNoteNumber'];
		$IN = $_POST['invoiceNumber'];
		$RN = $_POST['rejectNumber'];
		$TcN = $_POST['testCertificateNumber'];
		$LtN = $_POST['lpTestNumber'];
		$PrN = $_POST['photoReferenceNumber'];
		mysqli_stmt_bind_param($stmt , 'sssssssssssd', $DrF, $CS, $Quo, $CpoN, $PoN, $DnN, $IN, $RN, $TcN, $LtN, $PrN, $workid);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	exit();
}
?>
