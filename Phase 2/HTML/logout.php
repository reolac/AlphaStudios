<?php
ob_start();
session_start();
if (isset($_SESSION['loggedin']) &&  $_SESSION['loggedin'] === true)
{
	unset($_SESSION['loggedin']);
	session_destroy();
}
header('Location: login.html');
?>