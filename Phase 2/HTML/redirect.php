<?php
//php Author: Daniel Bentley eeu236
ob_start();
session_start();
//Sets the work ref variable
$_SESSION['WR'] = $_GET['clickedcell'];
header('Location: vCheckList.php');
?>