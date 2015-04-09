<?php


namespace controller;
use core;


class Adminlogin extends core\Controller {
	public function index($action = "login") {


		switch($action){
			
			
			case "login" :
				$this->load->view('Adminlogin', array(
					'fout' => "Deze pagina bestaat niet."
				));
				break;
			case "validateLogin" :
				$this->validateAdminLogin();
				//echo "validate";
				
				break;
		}

	}


private function validateAdminLogin()
{
	if (isset($_POST["inputUsername"]))
	{
		//$account = new AdminAccount();
		$username = $_POST["inputUsername"];
		$password = $_POST["inputPassword"];

		$account = $this->load->model('AdminAccount', null);
	
		// Ga de gegevens controlleren en schop mij in een if statement wanneer ze kloppen, anders geef een error op de login pagina
	
		if (true === $this->validateAdminLoginInfo($username, $password)) {

			//header("location: ./pages/index.php");
			$this->load->view('TestAdminLogin', array(
				'error' => "Deze pagina bestaat niet."
				));
		}
		elseif ($this->validateAdminLoginInfo($username, $password) === "gebruikersnaam") {
			//echo "<br />Maat, je bent vergeten waar je woont!<br />";
		 	//header("location: index.php?error=email");
		 	$this->load->view('Adminlogin', array(
				'error' => "gebruikersnaam"
				));
		} 
		elseif ($this->validateAdminLoginInfo($username, $password) === "wachtwoord") {
			//echo "<br />Je moet echt beter naar je toetsenbord kijken, want volgens mij zie je letters dubbel<br />";
			//header("location: index.php?error=wachtwoord");
			$this->load->view('Adminlogin', array(
				'error' => "wachtwoord"
				));
		}
		

	}
}

//should be in admin class
private function validateAdminLoginInfo($username, $password)
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


