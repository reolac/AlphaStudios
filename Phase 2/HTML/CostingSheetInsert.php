<?php
ob_start();
session_start();
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
	if($stmt = mysqli_prepare($conn, "INSERT INTO CostingSheet (Site,Job,Dates,Ref,WorkOrderRef,Cust,TotalMats,CarriageCharge,MaterialsPlus15,TotalMaterialCost,supplier, ContractorName, SubContractorName, SubConHr, SubConcRate,SubConcTot,SubConcET,labourCost, TotalCost) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
	{
		$cust = $_POST['costingCustomer'];
		$site = $_POST['costingSite'];
		$job = $_POST['costingJob'];
		$date = $_POST['costingDate'];
		$ref = $_POST['costingRef'];
		$won = $_POST['costingWON'];
		$mttc =$_POST['materialsTableTCost'];
		$mtc = $_POST['materialsTableCarriage'];
		$mtcp = $_POST['materialsTableTCostPer'];
		$mtt = $_POST['materialsTableTotal'];
		$sup = $_POST['materialsSupplier'];
		$cN = $_POST['contractorName'];
		$sCN = $_POST['subContractorName'];
		$sCH = $_POST['contractTableReqd0'];
		$sCU = $_POST['contractTableUCost0'];
		$sCT = $_POST['contractTableTCost0'];
		$sCP = $_POST['contractTableTCostPer'];
		$lTC = $_POST['labourTableTCost'];
		$tT = $_POST['TableTotal'];
		echo $cN;
		echo $sCN;
		mysqli_stmt_bind_param($stmt ,'ssssssddddsssdddddd', $site, $job, $date, $ref, $won , $cust, $mttc, $mtc, $mtcp, $mtt, $sup, $cN, $sCN, $sCH, $sCU ,$sCT ,$sCP, $lTC, $tT);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	$count = 0;
	$rows = $_POST['materialsTableCount'];
	$rows2 = $_POST['servicesTableCount'];
	$rows3 = $_POST['labourTableCount'];
	echo $rows3;
	if($stmt = mysqli_prepare($conn, "SELECT CostingSheet_ID FROM CostingSheet WHERE WorkOrderRef = ?"))
	{
		mysqli_stmt_bind_param($stmt, 's',$won);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $costid);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
	}
	while($count < $rows)
	{
		if($stmt = mysqli_prepare($conn, "INSERT INTO material (MatName, Required, UnitCost, Total, mCostingSheet) VALUES (?,?,?,?,?)"))
		{
			$out = "materialsTableDesc".$count;
			$out2 = "materialsTableReqd".$count;
			$out3 = "materialsTableUCost".$count;
			$out4 = "materialsTableTCost".$count;
			$mTD = $_POST[$out];
			$mTR = $_POST[$out2];
			$mTUC = $_POST[$out3];
			$mTTC = $_POST[$out4];
			mysqli_stmt_bind_param($stmt, 'ssdds',$mTD, $mTR, $mTUC, $mTTC, $costid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
		$count = $count + 1;
	}
	$count = 0;
	while($count < $rows2)
	{
		if($stmt = mysqli_prepare($conn, "INSERT INTO Service(SerName, Required, Cost, Total, sCostingSheet) VALUES(?,?,?,?,?)"))
		{
			$out = "servicesTableDesc".$count;
			$out2 = "servicesTableReqd".$count;
			$out3 = "servicesTableUCost".$count;
			$out4 = "servicesTableTCost".$count;

			$sTD = $_POST[$out];
			$sTR = $_POST[$out2];
			$sTUC = $_POST[$out3];
			$sTTC = $_POST[$out4];

			mysqli_stmt_bind_param($stmt, 'sdddd',$sTD, $sTR, $sTUC, $sTTC, $costid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
		$count = $count + 1;
	}
	$count = 0;
	while($count < $rows3)
	{
		if($stmt = mysqli_prepare($conn, "INSERT INTO Labour (LabName, hours, cost, total, lCostingSheet) VALUES(?,?,?,?,?)"))
		{
			$out = "labourTableDesc".$count;
			$out2 = "labourTableReqd".$count;
			$out3 = "labourTableUCost".$count;
			$out4 = "labourTableTCost".$count;

			$lTD = $_POST[$out];
			$lTR = $_POST[$out2];
			$lTUC = $_POST[$out3];
			$lTTC = $_POST[$out4];

			echo $lTD;
			echo $lTR;
			echo $lTUC;
			echo $lTTC;
			mysqli_stmt_bind_param($stmt, 'sdddd', $lTD, $lTR, $lTUC, $lTTC, $costid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
		$count = $count + 1;
	}
}
?>