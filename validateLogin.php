<?php
include 'account.class.inc.php';

if (isset($_POST["postalCode"]))
{
	$postalCode = $_POST["postalCode"];
	$houseNumber = $_POST["houseNumber"];
	$password = $_POST["password"];
	
	//Account::validateLoginInfo($postalCode, $houseNumber, $password);
	
	session_start();
	//Store Session Data
	$_SESSION['postalCode']= $postalCode;  // Initializing Session with value of PHP Variable
	
	echo $_SESSION['postalCode'];
}
else
{
	session_start();
	echo $_SESSION['postalCode'];
}


?>