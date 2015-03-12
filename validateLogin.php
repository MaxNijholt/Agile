<?php
include 'account.class.inc.php';

if (isset($_GET["mode"]))
{
	if ($_GET["mode"] === "logout")
	{
		//delete session variables -> logout
		session_start();
		session_destroy();
		header("location: index.php");
	}
	else if ($_GET["mode"] === "dashboard")
	{
		if (isset($_POST["dashUsername"]))
		{
			//check database and verify if the input is valid.
			//if valid, set session variable name. (from database)
			//
			$_SESSION["dashUser"] = $_POST["dashUsername"];
			header("location: dashboard/pages/index.php");
		}
	}
}


if (isset($_POST["postalCode"]))
{
	$postalCode = $_POST["postalCode"];
	$houseNumber = $_POST["houseNumber"];
	$password = $_POST["password"];
	
	//check database and verify if the input is valid.
	//if valid, set session variable name and role. (from database)
	
	//Account::validateLoginInfo($postalCode, $houseNumber, $password);
	
	session_start();
	//Store Session Data
	$_SESSION['postalCode']= $postalCode;  // Initializing Session with value of PHP Variable
	
	echo $_SESSION['postalCode'];
	header("location: index.php");
}
else
{
	session_start();
	//login failed
}

?>