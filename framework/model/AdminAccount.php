<?php

namespace model;
use core;

class AdminAccount extends core\Model
{

	public function validateAdminLoginInfo($username, $password)
	{
		$hashedpass;
		// Maak de querys aan voor de database class
		//$queryPassword = "SELECT * FROM admin WHERE gebruikersnaam = '$username';" ;
		$queryPassword = "SELECT * FROM admin WHERE gebruikersnaam = ?";

		// Voer de query uit, en zet de resultaten in de variabele resultset	
		$resultSet = $this->_db->select($queryPassword, array($username), true);

		// Plaats de resultset in een array die ik kan checken
		//while ($row = $resultSet->fetch_assoc()) {  
		//   	//echo "<br />".$row['wachtwoord']."<br />";

		//	$hashedpass = $row['wachtwoord'];
		//}


			//$this->load->view('TestAdminLogin', array(
			//	'result' => $resultSet
			//	));

		foreach($resultSet as $result)
		{
			$hashedpass = $result['wachtwoord'];
		}
		

		// Begin met kijken of het wachtwoord overeenkomt

		if (count($resultSet) === 0) {
			//echo "<br />Help mijn resultset is leeg, waarschijnlijk ben je je postcode en huisnummer vergeten<br />";
			return "gebruikersnaam";
		}
		else {
			if ($password === $hashedpass) {
				//echo "<br /> Je bent de bom, want je kan je wachtwoord onthouden! <br />";
				// Zet een session op, en stop daar alle relevante gegevens in

				//$_SESSION['accessLevel'] = 'reader';
				$_SESSION['adminUsername'] = $username;
				$_SESSION['adminLoggedIn'] = true;

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