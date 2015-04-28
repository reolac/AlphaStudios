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
	
			<img src="../img/GELogo.jpg"> 
		
		
	<div id='cssmenu'>
		<ul>
            <li class='last'><a href='#'><span>Home</span></a></li>
   			<li class='active'><a href='#'><span>Create</span></a></li>
   			<li><a href='#'><span>View</span></a></li>
   			<li class='last'><a href='#'><span>Logout</span></a></li>
			<li class='last'><a href='#'><span>Help</span></a></li>


		</ul>
	</div>
		

		<h1 class="subTitle">ENQUIRY - ORDER REGISTER</h1>
		<div class="progressText">
		<b>Enquiry</b> -> Check_List -> Verbal -> Costing_Sheet -> Purchase_Order -> Unknown -> Maintenence
	</div>	
	<progress value="10" max="70"></progress>
		<form method="POST" action="insert.php">
			<table class="enquiryTable">
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
				<tr >
					<td><input class="size" name="dateandtime" type="date"></td>
					<td><input  class="size" id="modeOfEnquiry" name="modeOfEnquiry" type="text"></td>
					<td><input  class="size" id="reference" name="reference" type="text"></td>
					<td><input class="size" id="nameandAddressofEnquiry" name="nameandAddressofEnquiry" type="text"></td>

					<td><input class="size" id="customerRequirementsAndDeliveryDate" name=
					"customerRequirementsAndDeliveryDate" type="text"></td>

					<td><input class="size" id="quotation" name="quotation" type="text"></td>

					<td><input class="size" id="customerOrderReference" name=
					"customerOrderReference" type="text"></td>

					<td><input class="size" id="orderAcceptance" name="orderAcceptance" type=
					"text"></td>

					<td><input class="size" id="workOrderReference" name="workOrderReference" type=
					"text"></td>

					<td><input class="size" id="workOrderExecution" name="workOrderExecution" type=
					"text"></td>
				</tr>
			</table>
                    <div id="container">
			<input class="createButton" id="button" type="submit" name="submit" value="Create">
                    </div>
                        </form>
	</div>
        </body>
    
</html>