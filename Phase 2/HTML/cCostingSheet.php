<!DOCTYPE HTML>
<html lang="en-GB">

    <head>
        <meta charset="UTF-8">
        <title>Create Costing Cheet</title>
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
        	<div id="container">
                <img src="../img/GELogo.jpg">
        	</div>
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

            

    		<h1 class="subTitle">New Costing Sheet</h1>
            <div class="costForm">
                <div>Customer: <input type="text" name="costingCustomer" id="costingSheet"/></div>
                <div>Site: <input type="text" name="costingSite" id="costingSheet"/></div>
                <div>Job: <input type="text" name="costingJob" id="costingSheet"/></div>
                <div>Date: <input type="date" name="costingDate" id="costingSheet"/></div>
                <div>Ref: <input type="text" name="costingRef" id="costingSheet"/></div>
                <div>W.O.N: <?php echo"<input type='text' name='costingWON' id='costingSheet' value='$wr'>"?></div>
                
                <table class="desc">
                    <tr>
                        <th class="col1">Ref</th>
                        <th class="">Item Description</th>
                        <th class="materials" colspan='3'>Materials</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <th class="col3">No. reqd</th>
                        <th class="col3">Unit Cost</th>
                        <th class="col3">Total Cost</th>
                    </tr>
                    <tr>
                        <td><input type="button" id="delPOIbutton" value="Add Row" onclick="addRow('materialsTable')"/></td>
                        <td colspan="3">Supplier: <input type="text" name="materialsSupplier"/></td>
                        <td></td>
                    </tr>
                </table>

                <table id="materialsTable">
                    <tr>
                        <td class="col1"><input type="text" value="0" readonly name="materialsTableRef0" id="materialsTableRef0" /></td>
                        <td class="iDesc"><input type="text" name="materialsTableDesc0" id="materialsTableDesc0"/></td>
                        <td class="no"><input type="text" name="materialsTableReqd0" id="materialsTableReqd0"  value="0" onkeyup="calc('materialsTable', 0); totalIt('materialsTable'); totalPer('materialsTable'); totalCost('materialsTable'); grandTotal()"/></td>
                        <td class="no">£<input type="text" name="materialsTableUCost0" id="materialsTableUCost0"  value="0.00" onkeyup="calc('materialsTable', 0); totalIt('materialsTable'); totalPer('materialsTable'); totalCost('materialsTable'); grandTotal()"/></td>
                        <td class="no">£<input type="text" name="materialsTableTCost0" id="materialsTableTCost0" value="0.00" readonly></td>
                    </tr>
                </table>
                <table class="desc">
                    <tr>
                        <td class="col1"></td>
                        <td colspan="2" class="iDesc"><b>TOTAL MATERIALS<b></td>
                        <td class="no">£<input type="text" name="materialsTableTCost" value="0.00" readonly id="materialsTableTCost"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">Total Carriage charge</td>
                        <td class="no">£<input onkeyup="calc('materialsTable', 0); totalIt('materialsTable'); totalPer('materialsTable'); totalCost('materialsTable')" value="0.00" type="text" name="materialsTableCarriage" id="materialsTableCarriage"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" >Total Materials plus 15%</td>
                        <td class="no">£<input type="text" name="materialsTableTCostPer" value="0.00" readonly id="materialsTableTCostPer"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2"><b>TOTAL MATERIAL COSTS</b></td>
                        <td class="no">£<input type="number" name="materialsTableTotal" value="0.00" readonly id="materialsTableTotal"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td ><b>OUTSIDE SERVICES</b></td>
                        <td>No. reqd</td>
                        <td>Unit Cost</td>
                    </tr>
                    <tr style>
                        <td><input type="button" id="delPOIbutton" value="Add Row" onclick="addRow('servicesTable')"/></td>
                        <td colspan="2">Contractor Name: <input type="text" name="contractorName"/></td>
                        <td></td>
                    </tr>
                    
                </table>
                <table id="servicesTable">
                    <tr>
                        <td class="col1"><input type="text" value="0" readonly name="servicesTableRef0" id="servicesTableRef0"/></td>
                        <td class="iDesc"><input type="text" name="servicesTableDesc0" id="servicesTableDesc0" /></td>
                        <td class="no"><input type="text" name="servicesTableReqd0" id="servicesTableReqd0"  value="0" onkeyup="calc('servicesTable', 0); totalIt('servicesTable'); totalPer('servicesTable'); grandTotal()"/></td>
                        <td class="no">£<input type="text" name="servicesTableUCost0" id="servicesTableUCost0" value="0.00" onkeyup="calc('servicesTable', 0); totalPer('servicesTable'); grandTotal()"/></td>
                        <td class="no">£<input type="text" name="servicesTableTCost0" id="servicesTableTCost0" value="0.00" readonly/></td>
                    </tr> 
                    </table>    
                    <table class="desc">
                    <tr>
                        <td class="col1"></td>
                        <td colspan="4">Total Outside Services Costs plus 15%</td>
                        <td class="no">£<input type="text" name="servicesTableCostPer" value="0.00" readonly id="servicesTableTCostPer"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="4"><b>TOTAL COSTS<b></td>
                        <td>£<input type="number" name="servicesTableTotal" value="0.00" readonly id="servicesTableTotal"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2" class="iDesc"><b>SUB-CONTRACT LABOUR</b></td>
                        <td class="no">Hrs</td>
                        <td class="no">Rate</td>
                        <td class="no">Total</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6">Sub-Contractor Name: <input type="text" name="subContractorName"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="2">Sub-contract Labour only costs</td>
                        <td><input type="text" name="contractTableReqd0" id="contractTableReqd0" value="0" onkeyup="calc('contractTable', 0); grandTotal()"/></td>
                        <td>£<input type="text" name="contractTableUCost0" id="contractTableUCost0" value="0.00" onkeyup="calc('contractTable', 0); grandTotal()"/></td>
                        <td>£<input type="text" name="contractTableTCost0" id="contractTableTCost0" value="0.00" readonly/></td>
                    </tr>            
                    <tr>
                        <td></td>
                        <td colspan="4">Sub-Contract Labour plus 15%</td>
                        <td><input type="text" name="contractTableTCostPer" id="contractTableTCostPer" readonly/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="4"><b>TOTAL SUB-CONTRACT LABOUR COSTS<b></td>
                        <td><input type="number" name="contractTableTCostPer" id="contractTableTotal" readonly/></td>
                    </tr>
                    <tr>
                        <td><input type="button" id="delPOIbutton" value="Add Row" onclick="addRow('labourTable')"/></td>
                        <td colspan="2"><b>LABOUR</b></td>
                        <td>Hrs</td>
                        <td>Rate</td>
                        <td>Total</td>
                    </tr>
                </table >
                    <table id="labourTable">
                    <tr>
                        <td class="col1"><input type="text" value="0" readonly name="labourTableRef0" id="labourTableRef0" /></td>
                        <td class="lab"><input type="text" name="labourTableDesc0" id="labourTableDesc0"/></td>
                        <td class="no2"><input type="text" name="labourTableReqd0" id="labourTableReqd0" value="0"/ onkeyup="calc('labourTable', 0); totalIt('labourTable', 0); grandTotal()"></td>
                        <td class="no2">£<input type="text" name="labourTableUCost0" id="labourTableUCost0" value="0.00" onkeyup="calc('labourTable', 0); totalIt('labourTable', 0); grandTotal()"/></td>
                        <td class="no">£<input type="text" name="labourTableTCost0" id="labourTableTCost0" value="0.00" readonly/></td>
                    </tr>  
                </tabl£e>
                <table class="desc">
                    <tr>
                        <td class="col1"></td>
                        <td colspan="4"><b>TOTAL LABOUR<b></td>
                        <td class="no">£<input type="text" name="labourTableTCost" id="labourTableTCost" value="0.00" readonly/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="4">Sub-Contract Labour plus 0%</td>
                        <td class="no">£<input type="text" name="labourTableTCostPer" value="0.00" readonly id="labourTableTCostPer"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="4">Total cost for labour</td>
                        <td class="no">£<input type="number" name="labourTableTotal" value="0.00" readonly id="labourTableTotal"/></td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td colspan="5"><b>TOTAL COST<b><input type="button" id="delPOIbutton" value="GrandTotal" onclick="grandTotal()"/></td>
                        <td>£<input type="number" name="TableTotal" value="0.00" readonly id="TableTotal"/></td>
                    </tr>
                </table>
            </div>
            <div id="container">
            <input type="submit" id="sendCheckList" name="submit" class="createButton"></input>
            </div>
    
  </div>
        
    </body>
</html>