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
	echo "in thing";
	
	$query1 = "INSERT INTO customer (Address) VALUES ('$_POST[nameandAddressofEnquiry]')";
	$query2 = "INSERT INTO enquiry (Customer) SELECT Customer_ID FROM customer WHERE Address = '$_POST[nameandAddressofEnquiry]' AND WorkOrdRef = '$_POST[workOrderReference]'";
	$query3 = "INSERT INTO enquiry (ModeOfEnquiry, TimeOfEnquiry, CustomerReqDate, QuotationRef, Reference, CustOrderRef, WorkOrdRef, WorkStatus) VALUES ('$_POST[modeOfEnquiry]','$_POST[dateandtime]','$_POST[customerRequirementsAndDeliveryDate]','$_POST[quotation]','$_POST[reference]','$_POST[customerOrderReference]','$_POST[workOrderReference]','$_POST[workOrderExecution]')";
	mysqli_query($conn,$query1);
	mysqli_query($conn,$query3);
	mysqli_query($conn,$query2);
	exit();
}