<!DOCTYPE HTML>
<html lang="en-GB">
	<head>
        <meta charset="UTF-8">
        <title>View Enquirys</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <?php
    //php Author: Daniel Bentley eeu236
    ob_start();
    session_start();
    //redirects if the user isn't logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
    {
      #user logged in
    }
    else 
    {
      header('Location: login.html');
    }
    //Connects to the database
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
    $wr = $_SESSION['WR'];
    $result2 = mysqli_query($conn, "SELECT * FROM WorkOrder WHERE WorkOrderRef = '$wr'");
    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $result = mysqli_query($conn, "SELECT DrawRefNum, CostingSheet, Quotation, CustPurOrdNum, PurOrdNum, DelNotNum, InvNum, RejNum, TestCertNum, LPTest, PhotoRefNum FROM checklist WHERE jWorkOrd = '$row2[WorkOrder_ID]'");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    ?>
    <body>
		<div id= "container">
			<img src="../img/GELogo.jpg"> 
		</div>
    <div id='cssmenu'>
        <ul>
            <li class='last'><a href='#'><span>Create</span></a></li>
            <li class='active'><a href='#'><span>View</span></a></li>
            <li class='last'><a href='#'><span>Logout</span></a></li>
            <li class='last'><a href='#'><span>Help</span></a></li>
        </ul>
    </div>
        <div class="content">
        <h1 class="subTitle">Check List</h1>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Input</th> 
                </tr>
                <tr>
                    <td class="fontTh"> Drawing Reference Number </td>
                    <td><?php echo $row['DrawRefNum']?></td>
                </tr>
                <tr>
                    <td class="fontTh"> Costing Sheet </td>
                    <td><?php echo $row['CostingSheet']?></td>
                </tr>
                <tr>
                    <td class="fontTh"> Quotation </td>
                    <td><?php echo $row['Quotation']?></td>
                </tr>
                <tr>
                    <td class="fontTh"> Custom Purchase Order Number </td>
                    <td><?php echo $row['CustPurOrdNum']?></td>
                <tr>
                    <td class="fontTh"> Job Sheet </td>
                    <td><?php echo $wr?></td>
                </tr>
                <tr>
                    <td class="fontTh"> Purchase Order Number </td>
                    <td><?php echo $row['PurOrdNum']?></td>
                </tr>
                <tr>
                    <td class="fontTh"> Delivery Note Number </td>
                    <td><?php echo $row['DelNotNum']?></td>
                </tr>
                <tr>
                    <td class="fontTh"> Invoice Number </td>
                    <td><?php echo $row['InvNum']?></td>
                </tr>
                <tr>
                    <td class="fontTh"> Reject Number </td>
                    <td><?php echo $row['RejNum']?></td>
                </tr>
                <tr>
                    <td class="fontTh"> Test Certificate Number </td>
                    <td><?php echo $row['TestCertNum']?></td>
                </tr>
                <tr>
                    <td class="fontTh"> LP Test Number </td>
                    <td><?php echo $row['LPTest']?></td>
                </tr>
                <tr>
                    <td class="fontTh"> Photo Reference Number </td>
                    <td><?php echo $row['PhotoRefNum']?></td>
                </tr>
            </table>
        </div>
    </body>
    <?php
    }
    ?>
</html>