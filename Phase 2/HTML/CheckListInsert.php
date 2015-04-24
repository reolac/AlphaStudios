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
	if($stmt = mysqli_prepare($conn, "INSERT INTO checklist (DrawRefNum, CostingSheet, Quotation, CustPurOrdNum, JobSheet, PurOrdNum, DelNotNum, InvNum, RejNum, TestCertNum, LPTest, PhotoRefNum)
	VALUES(?,?,?,?,?,?,?,?,?,?,?,?)"))
	{
		$DrF = $_POST['drawingReferenceNumber'];
		$CS = $_POST['costingSheet'];
		$Quo = $_POST['quotation'];
		$CpoN = $_POST['customPurchaseOrderNumber'];
		$JS = $_POST['jobSheet'];
		$PoN = $_POST['purchaseOrderNumber'];
		$DnN = $_POST['deliveryNoteNumber'];
		$IN = $_POST['invoiceNumber'];
		$RN = $_POST['rejectNumber'];
		$TcN = $_POST['testCertificateNumber'];
		$LtN = $_POST['lpTestNumber'];
		$PrN = $_POST['photoReferenceNumber'];
		mysqli_stmt_bind_param($stmt , 'ssssssssssss', $DrF, $CS, $Quo, $CpoN, $JS, $PoN, $DnN, $IN, $RN, $TcN, $LtN, $PrN);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	#$query = "INSERT INTO checklist (DrawRefNum, CostingSheet, Quotation, CustPurOrdNum, JobSheet, PurOrdNum, DelNotNum, InvNum, RejNum, TestCertNum, LPTest, PhotoRefNum)
	#VALUES ('$_POST[drawingReferenceNumber]','$_POST[costingSheet]','$_POST[quotation]','$_POST[customPurchaseOrderNumber]','$_POST[jobSheet]','$_POST[purchaseOrderNumber]','$_POST[deliveryNoteNumber]','$_POST[invoiceNumber]','$_POST[rejectNumber]','$_POST[testCertificateNumber]','$_POST[lpTestNumber]','$_POST[photoReferenceNumber]')";
	#mysqli_query($conn,$query);
	echo "inserted";
	exit();
}
?>
