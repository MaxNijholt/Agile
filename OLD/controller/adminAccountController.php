<?php

include '../model/adminAccount.class.inc.php';
include '../view/adminAccountView.php';

// $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $actual_link;

// $param = explode('/', $actual_link);
	

if (isset($_GET["mode"]))
{
	switch ($_GET["mode"])
	{
		case "create":
			showCreateAdmin();
			break;
			
		case "createConfirm":
			AdminAccount::createAdminAccount($_POST["inputEmail"], $_POST["inputWachtwoord"], $_POST["inputVoornaam"], $_POST["inputAchternaam"]);
			header("location: adminAccountController.php");
			break;
			
		case "update":
			if (isset($_GET["id"]))
			{
				$admin = AdminAccount::getAdminAccount($_GET["id"]);
				showUpdateAdmin($admin);
			}
			break;
			
		case "updateConfirm":
			if (isset($_GET["id"]))
			{
				AdminAccount::updateAdminAccount($_GET["id"], $_POST["inputEmail"], $_POST["inputWachtwoord"], $_POST["inputVoornaam"], $_POST["inputAchternaam"]);
// 				echo $_GET["id"]."<br>";
// 				echo $_POST["inputEmail"]."<br>";
// 				echo $_POST["inputWachtwoord"]."<br>";
// 				echo $_POST["inputVoornaam"]."<br>";
// 				echo $_POST["inputAchternaam"]."<br>";
				header("location: adminAccountController.php");
			}
			break;
			
		case "delete":
			if (isset($_GET["id"]))
			{
				//AdminAccount::deleteAdminAccount($_GET["id"]);
				//header("location: adminAccountController.php");
				showDelete($_GET["id"]);
			}
			break;
		case "deleteConfirm":
			if (isset($_GET["id"]))
			{
				AdminAccount::deleteAdminAccount($_GET["id"]);
				header("location: adminAccountController.php");
			}
			else
			{
				header("location: adminAccountController.php");
			}
			break;
	}
}
else
{
	$admins = AdminAccount::getAdminAccounts();
	showAdminsFancy($admins);
}


?>