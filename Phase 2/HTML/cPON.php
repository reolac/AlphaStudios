<!DOCTYPE HTML>
<html lang="en-GB">

    <head>
        <meta charset="UTF-8">
        <title>Create Purchase Order</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script language="javascript" type"text/javascript" src="../js/script.js"></script>
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
    }
    $wr = $_SESSION['WR'];?>
    <body>
        <form method="POST" action="CostingSheetInsert.php">
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
            <input type="hidden" name="materialsTableCount" value="1" id="materialsTableCount"/>
            <input type="hidden" name="servicesTableCount" value="1" id="servicesTableCount"/>
            <input type="hidden" name="labourTableCount" value="1" id="labourTableCount"/>

            <div class="progressText">
                Enquiry -> Check_List -> Verbal -> Costing_Sheet -> <B>Purchase_Order</B> -> Unknown -> Maintenence
            </div>  
            <progress value="50" max="100"></progress>

    		<h1 class="subTitle">New Purchase Order</h1>
            <div id="Container">
            <div class="testPon">
                <table >
                    <tr>
                        <th class="">Test Date</th>
                        <th class="">P.O.No</th>
                    </tr>
                    <tr>
                        <td class=""><input type="text" value=""  id="" /></td>
                        <td class=""><input type="text" value=""  id="" /></td>
                    </tr>
            </table>
            </div>
            <div class="sup">
                <table >
                    <tr>
                        <th class="">Supplier</th>
                        
                    </tr>
                     <tr>
                        <td class=""><input type="text" readonly name=""value=""  id="" /></td>
                        
                    </tr>
                 </table>
            </div>
    <div class="shipTo">
                <table >
                    <tr>
                        <th class="">Ship To</th>
                        
                    </tr>
                     <tr>
                        <td class=""><input type="text" readonly name=""value=""  id="" /></td>
                        
                    </tr>
                 </table>
            </div>
    <div class="terms">
                <table >
                    <tr>
                        <th class="">Terms</th>
                        <th class="">Expected</th>
                            <th class="">Ship Via</th>
                    </tr>
                    <tr>
                        <td class=""><input type="text" value=""  id="" /></td>
                        <td class=""><input type="text" value=""  id="" /></td>
                            <td class=""><input type="text" value=""  id="" /></td>
                    </tr>
            </table>
            </div>
            <div class="ponDesc">
                <table >
                    <tr>
                        <th class="">Description</th>
                        <th class="">Quantity</th>
                            <th class="">Rate</th>
                                <th class="">VAT</th>
                            <th class="">Amount</th>
                    </tr>
                    <tr>
                        <td class=""><input type="text" value=""  id="" /></td>
                        <td class=""><input type="text" value=""  id="" /></td>
                            <td class=""><input type="text" value=""  id="" /></td>
                                <td class=""><input type="text" value=""  id="" /></td>
                        <td class=""><input type="text" value=""  id="" /></td>
                    
                    </tr>
            </table>
            </div>
    <div class="vat">
                <table >
                    <tr>
                        <th class="">VAT Summary</th>
                        <th class=""></th>
                            <th class=""></th>
                    </tr>
                    
            </div>
    <div class="ponTotal">
                <table >
                    <tr>
                        <th class="">Subtotal</th>
                        <th class="">VAT Total</th>
                            <th class="">Total</th>
                    </tr>
                    <tr>
                        <td class=""><input type="text" value=""  id="" /></td>
                        <td class=""><input type="text" value=""  id="" /></td>
                            <td class=""><input type="text" value=""  id="" /></td>
                    </tr>
            </table>
            </div>
    <div class="vatNum">
                <table >
                    <tr>
                        <th class="">Compant VAT Number</th>
                        <th class="">826942992</th>
                    </tr>
                    
            </table>
            </div>
    
    
    
    
    
    
    
    
    
    
    
            </div>
            </div>
            <div id="container">
            <input type="submit" id="sendCheckList" name="submit" class="createButton"></input>
            </div>
        </form>
        
    </body>
</html>