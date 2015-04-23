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
$WOR = $_SESSION['WoR'];
if(isset($_POST['submit']))
{
	$query = "INSERT INTO checklist (DrawRefNum, CostingSheet, Quotation, CustPurOrdNum, JobSheet, PurOrdNum, DelNotNum, InvNum, RejNum, TestCertNum, LPTest, PhotoRefNum)
	VALUES ('$_POST[drawingReferenceNumber]','$_POST[costingSheet]','$_POST[quotation]','$_POST[customPurchaseOrderNumber]','$_POST[jobSheet]','$_POST[purchaseOrderNumber]','$_POST[deliveryNoteNumber]','$_POST[invoiceNumber]','$_POST[rejectNumber]','$_POST[testCertificateNumber]','$_POST[lpTestNumber]','$_POST[photoReferenceNumber]')";
	mysqli_query($conn,$query);
	echo "inserted";
	exit();
}
?>
