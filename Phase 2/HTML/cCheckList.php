<!DOCTYPE HTML>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <title>Create Check List</title>
        
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
    <h1 class="subTitle">CHECKLIST</h1>
        <div class="progressText">
        <b>Enquiry</b> -> Check_List -> Verbal -> Costing_Sheet -> Purchase_Order -> Unknown -> Maintenence
    </div>  
<progress value="20" max="70"></progress>
        <form method="POST" action="CheckListInsert.php">
            
                <table class="checkListTable">
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
            <div id="container">
        <input type="submit" id="sendCheckList" name="submit" class="createButton"></input>
        </div>
        </form>
   
    </body>
</html>