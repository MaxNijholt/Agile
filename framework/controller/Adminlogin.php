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

		$model = $this->load->model('AdminAccount', null);
	
		// Ga de gegevens controlleren en schop mij in een if statement wanneer ze kloppen, anders geef een error op de login pagina
	
		if (true === $model->validateAdminLoginInfo($username, $password)) {

			//header("location: ./pages/index.php");
			$this->load->view('TestAdminLogin', array(
				'error' => "Deze pagina bestaat niet."
				));
		}
		elseif ($model->validateAdminLoginInfo($username, $password) === "gebruikersnaam") {
			//echo "<br />Maat, je bent vergeten waar je woont!<br />";
		 	//header("location: index.php?error=email");
		 	$this->load->view('Adminlogin', array(
				'error' => "gebruikersnaam"
				));
		} 
		elseif ($model->validateAdminLoginInfo($username, $password) === "wachtwoord") {
			//echo "<br />Je moet echt beter naar je toetsenbord kijken, want volgens mij zie je letters dubbel<br />";
			//header("location: index.php?error=wachtwoord");
			$this->load->view('Adminlogin', array(
				'error' => "wachtwoord"
				));
		}
		

	}
}


}


