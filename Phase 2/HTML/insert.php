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
	
	$date = $_POST['dateandtime'];

	$query1 = "INSERT INTO customer (Address) VALUES ('$_POST[nameandAddressofEnquiry]')";
	$query2 = "INSERT INTO enquiry (ModeOfEnquiry, TimeOfEnquiry, CustomerReqDate, QuotationRef, Reference, CustOrderRef) VALUES ('$_POST[modeOfEnquiry]','$_POST[dateandtime]','$_POST[customerRequirementsAndDeliveryDate]','$_POST[quotation]','$_POST[reference]','$_POST[customerOrderReference]')";
	#$query3 = "INSERT INTO enquiry (TimeOfEnquiry) VALUES ('$_POST[dateandtime]')";
	#echo $date;
	mysqli_query($conn,$query2);
	exit();
	#echo $result;
}