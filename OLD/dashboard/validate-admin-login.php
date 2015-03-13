<?php

// Op dit moment nog even een vieze manier van redirecten maar dit wordt later in het framework opgelost

include_once'admin-account.class.inc.php';
include_once './../database.class.inc.php';

if (isset($_POST["inputEmail"]))
{
	$account = new adminAccount();
	$email = $_POST["inputEmail"];
	$password = $_POST["inputPassword"];

	// Ga de gegevens controlleren en schop mij in een if statement wanneer ze kloppen, anders geef een error op de login pagina

	if (true === $account->validateAdminLoginInfo($email, $password)) {
		//echo "<br />-Everything is gonna be alright- Bob Marley<br />";
		header("location: ./pages/index.php");
	}
	elseif ($account->validateAdminLoginInfo($email, $password) === "email") {
		//echo "<br />Maat, je bent vergeten waar je woont!<br />";
	 	header("location: index.php?error=email");
	} 
	elseif ($account->validateAdminLoginInfo($email, $password) === "wachtwoord") {
		//echo "<br />Je moet echt beter naar je toetsenbord kijken, want volgens mij zie je letters dubbel<br />";
		header("location: index.php?error=wachtwoord");
	}
}
else
{
	
}

?>