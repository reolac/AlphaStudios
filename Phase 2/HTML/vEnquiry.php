<!DOCTYPE HTML>
<html lang="en-GB">
	<head>
        <meta charset="UTF-8">
        <title>View Enquirys</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
    	
    <img src="../img/GELogo.jpg"> 

	<div id='cssmenu'>
		<ul>
   			<li class='last'><a href='#'><span>Create</span></a></li>
   			<li class='active'><a href='#'><span>View</span></a></li>
   			<li class='last'><a href='#'><span>Logout</span></a></li>
			<li class='last'><a href='#'><span>Help</span></a></li>
		</ul>
	</div>
		<table id="enquiry" class="table">
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
		    }
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
			$result = mysqli_query($conn, "SELECT * FROM enquiry");
			$result2 = mysqli_query($conn, "SELECT * FROM customer");
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)
			?>
			<tr>
				<td><?php echo $row['TimeOfEnquiry']?></td>
				<td><?php echo $row['ModeOfEnquiry']?></td>
				<td><?php echo $row['Reference']?></td>
				<td><?php echo $row2['Address']?></td>
				<td><?php echo $row['CustomerReqDate']?></td>
				<td><?php echo $row['QuotationRef']?></td>
				<td><?php echo $row['CustOrderRef']?></td>
				<td><?php echo $row['QuoteReview']?></td>
				<td><?php echo "<a href=redirect.php?clickedcell=$row[WorkOrdRef]>$row[WorkOrdRef]</a>"?></td>
				<td><?php echo $row['WorkStatus']?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</body>
</html>