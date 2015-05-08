<?php
//php Author: Daniel Bentley eeu236
ob_start();
session_start();
//Destroys sessions and session variables
if (isset($_SESSION['loggedin']) &&  $_SESSION['loggedin'] === true)
{
	unset($_SESSION['loggedin']);
	session_destroy();
}
header('Location: login.html');
?>