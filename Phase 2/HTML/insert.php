<?php
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
	$query1 = "INSERT INTO customer (Address) VALUES ('$_POST[nameandAddressofEnquiry]')";
	mysqli_query($conn,$query1);
	$result = mysqli_query($conn,"SELECT Customer_ID FROM customer WHERE Address = '$_POST[nameandAddressofEnquiry]'");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$custid = $row['Customer_ID'];
	$query3 = "INSERT INTO enquiry (ModeOfEnquiry, TimeOfEnquiry, CustomerReqDate, QuotationRef, Reference, CustOrderRef, WorkOrdRef, WorkStatus, Customer) VALUES ('$_POST[modeOfEnquiry]','$_POST[dateandtime]','$_POST[customerRequirementsAndDeliveryDate]','$_POST[quotation]','$_POST[reference]','$_POST[customerOrderReference]','$_POST[workOrderReference]','$_POST[workOrderExecution]','$custid')";
	mysqli_query($conn,$query3);
	header('Location: cHome.html');
	exit();
}