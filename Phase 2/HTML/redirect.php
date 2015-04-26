<?php
ob_start();
session_start();
$_SESSION['WR'] = $_GET['clickedcell'];
header('Location: vCheckList.php');
?>