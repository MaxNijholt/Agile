<?php

// Op dit moment nog even een vieze manier van redirecten maar dit wordt later in het framework opgelost

include_once'account.class.inc.php';
include_once 'database.class.inc.php';

if (isset($_POST["postalCode"]))
{
	$account = new account();
	$postalCode = $_POST["postalCode"];
	$houseNumber = $_POST["houseNumber"];
	$password = $_POST["password"];
	
	// Ga de gegevens controlleren en schop mij in een if statement wanneer ze kloppen, anders geef een error op de login pagina

	if (true === $account->validateResidentLoginInfo($postalCode, $houseNumber, $password)) {
		//echo "<br />-Everything is gonna be alright- Bob Marley<br />";
		header("location: index.php");
	}
	elseif ($account->validateResidentLoginInfo($postalCode, $houseNumber, $password) === "posthuis") {
		//echo "<br />Maat, je bent vergeten waar je woont!<br />";
	 	header("location: inloggen.php?error=posthuis");
	} 
	elseif ($account->validateResidentLoginInfo($postalCode, $houseNumber, $password) === "wachtwoord") {
		//echo "<br />Je moet echt beter naar je toetsenbord kijken, want volgens mij zie je letters dubbel<br />";
		header("location: inloggen.php?error=wachtwoord");
	}
}
else
{
	
}

?>