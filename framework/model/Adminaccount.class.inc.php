<?php

namespace model;
use core;

class AdminAccount extends core\Model
{

	private $hashedpass;

	public function validateAdminLoginInfo($username, $password)
	{
		// Maak de querys aan voor de database class
		$queryPassword = "SELECT wachtwoord FROM admin WHERE gebruikersnaam = '$username';" ;

		// Voer de query uit, en zet de resultaten in de variabele resultset	
		$resultSet = $this->_db->select($queryPassword);

		//print_r($resultSet);

		// Plaats de resultset in een array die ik kan checken

		while ($row = $resultSet->fetch_assoc()) {  
		   	//echo "<br />".$row['wachtwoord']."<br />";

			$hashedpass = $row['wachtwoord'];
			//echo $hashedpass;
		}		

		// Begin met kijken of het wachtwoord overeenkomt

		if (mysqli_num_rows($resultSet) === 0) {
			//echo "<br />Help mijn resultset is leeg, waarschijnlijk ben je je postcode en huisnummer vergeten<br />";
			return "gebruikersnaam";
		}
		else {
			if ($password === $hashedpass) {
				//echo "<br /> Je bent de bom, want je kan je wachtwoord onthouden! <br />";
				// Zet een session op, en stop daar alle relevante gegevens in

				session_start();

				//$_SESSION['accessLevel'] = 'reader';
				$_SESSION['adminUsername'] = $username;
				$_SESSION['loggenIn'] = true;

				//echo "<br />Haha ik heb lekker een session met variabelen aangemaakt!<br />";

				return true;
			}
			else {
				//echo "<br /> Of je hebt een typo gemaakt of je bent gewoon fucking dom! <br />";
				return "wachtwoord";
			}
		}
	}
}

?>