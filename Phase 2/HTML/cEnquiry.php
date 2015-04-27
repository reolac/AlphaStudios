<!DOCTYPE html>
<html>
	<head>
		<link href="../css/style.css" rel="stylesheet" type="text/css">

		<title>Create Enquiry Form</title>
	</head>
	<?php 
    ob_start();
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
    {
      #user logged in
    }
    else 
    {
      #header('Location: login.html');
    }?>
	<body>
	<div id='cssmenu'>
		<ul>
   			<li class='active'><a href='#'><span>Create</span></a></li>
   			<li><a href='#'><span>View</span></a></li>
   			<li class='last'><a href='#'><span>Logout</span></a></li>
			<li class='last'><a href='#'><span>Help</span></a></li>


		</ul>
	</div>
		<div id="container">
			<p><span class="gap">GAP</span> <span class="electrical">Electrical and
			Mechanical Services Ltd</span></p>
		</div>
		<h1 class="subTitle">ENQUIRY - ORDER REGISTER</h1>
		<form method="POST" action="insert.php">
			<table id="enquiry">
				<tr>
					<th>Date and Time of Enquiry</th>
					<th>Mode of Enquiry</th>
					<th>Reference</th>
					<th>Name and address of the customer</th>
					<th>Customer's Requirements and Delivery Date</th>
					<th>Quotation Reference and Follow-Up Details</th>
					<th>Customer Order Reference</th>
					<th>Order Acceptance Reviewer & Signature of Reviewer</th>
					<th>Work Order Reference</th>
					<th>Work Order Execution Status</th>
				</tr>
				<tr>
					<td><input name="dateandtime" type="date"></td>
					<td><input id="modeOfEnquiry" name="modeOfEnquiry" type="text"></td>
					<td><input id="reference" name="reference" type="text"></td>
					<td><input id="nameandAddressofEnquiry" name="nameandAddressofEnquiry" type="text"></td>

					<td><input id="customerRequirementsAndDeliveryDate" name=
					"customerRequirementsAndDeliveryDate" type="text"></td>

					<td><input id="quotation" name="quotation" type="text"></td>

					<td><input id="customerOrderReference" name=
					"customerOrderReference" type="text"></td>

					<td><input id="orderAcceptance" name="orderAcceptance" type=
					"text"></td>

					<td><input id="workOrderReference" name="workOrderReference" type=
					"text"></td>

					<td><input id="workOrderExecution" name="workOrderExecution" type=
					"text"></td>
				</tr>
			</table>
			<input class="createButton" id="button" type="submit" name="submit" value="Create">
		</form>
	</body>
</html>