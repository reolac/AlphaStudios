<!DOCTYPE HTML>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <title>Create Check List</title>
        <link rel="stylesheet" type="text/css" href="../css/checkList.css">
         <link rel="stylesheet" type="text/css" href="../css/style.css">
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
		<div id= "container">
			<img src="../img/GELogo.jpg"> 
		</div>
  <div id='cssmenu'>
    <ul>
        <li class='active'><a href='#'><span>Create</span></a></li>
        <li><a href='#'><span>View</span></a></li>
        <li class='last'><a href='#'><span>Logout</span></a></li>
      <li class='last'><a href='#'><span>Help</span></a></li>
    </ul>
  </div>


        <form method="POST" action="CheckListInsert.php">
            <div class="content">
            <h1 class="subTitle">Check List</h1>
                <table>
                    <tr>
                        <th>Item</th>
                        <th>Input</th> 
                    </tr>
                    <tr>
                        <td class="fontTh"> Drawing Reference Number </td>
                        <td><input type="text" name="drawingReferenceNumber" id="drawingReferenceNumber" class="colorTwo"></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> Costing Sheet </td>
                        <td><input type="text" name="costingSheet" id="costingSheet" class="colorOne"></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> Quotation </td>
                        <td><input type="text" name="quotation" id="quotation" class="colorTwo"></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> Custom Purchase Order Number </td>
                        <td><input type="text" name="customPurchaseOrderNumber" id="customPurchaseOrderNumber" class="colorOne"></td>

                    <tr>
                        <td class="fontTh"> Job Sheet </td>
                        <td><?php $WOR = $_SESSION['WoR']; echo"<input type='text' name='jobSheet' id='jobSheet' class='colorTwo' value='$WOR'>"?></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> Purchase Order Number </td>
                        <td><input type="text" name="purchaseOrderNumber" id="purchaseOrderNumber" class="colorOne"></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> Delivery Note Number </td>
                        <td><input type="text" name="deliveryNoteNumber" id="deliveryNoteNumber" class="colorTwo"></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> Invoice Number </td>
                        <td><input type="text" name="invoiceNumber" id="invoiceNumber" class="colorOne"></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> Reject Number </td>
                        <td><input type="text" name="rejectNumber" id="rejectNumber" class="colorTwo"></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> Test Certificate Number </td>
                        <td><input type="text" name="testCertificateNumber" id="testCertificateNumber" class="colorOne"></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> LP Test Number </td>
                        <td><input type="text" name="lpTestNumber" id="lpTestNumber" class="colorTwo"></td>
                    </tr>
                    <tr>
                        <td class="fontTh"> Photo Reference Number </td>
                        <td><input type="text" name="photoReferenceNumber" id="photoReferenceNumber" class="colorOne"></td>
                    </tr>
                </table>
            </div>
        <input type="submit" id="sendCheckList" name="submit" class="createButton"></input>
        </form>
    </body>
</html>