<?php

namespace controller;
use core;

class Adminaccountbeheer extends core\Controller {
	public function index($action = 'list') {


		switch ($action)
		{
			case 'list'		:
				$admins = $this->getAdmins();
				$this->load->view('AdminOverzicht', array("admins" => $admins));
				break;
			case 'create'	:
				$this->load->view('AdminCreate');
				break;
			case 'createConfirm'	:
				if (count($this->validateInput()) !== 0)
				{
					$this->load->view('AdminCreate', array("errors" => $this->validateInput(), "input" => $this->getInput()));
				} 
				else
				{
					$this->createAdminAccount($_POST["inputEmail"], $_POST["inputWachtwoord"], $_POST["inputVoornaam"], $_POST["inputAchternaam"], $_POST["inputGebruikersnaam"]);
					$admins = $this->getAdmins();
					$this->load->view('AdminOverzicht', array("admins" => $admins));
				}	
				break;
			case 'delete'	:
				$this->load->view('AdminDelete', array("id" => $_POST["id"]));
				break;
			case 'deleteConfirm'	:
			    if (isset($_POST["id"]))
			    {
			    	$this->deleteAdminAccount($_POST["id"]);
			    }
				$admins = $this->getAdmins();
				$this->load->view('AdminOverzicht', array("admins" => $admins));
				break;
			case 'update'	:
				$admin = $this->getAdminAccount($_POST["id"]);
				$this->load->view('AdminUpdate', array("admin" => $admin));
				break;
			case 'updateConfirm'	:
				if (count($this->validateInput()) !== 0)
				{
					$admin = $this->getAdminAccount($_POST["id"]);
					$this->load->view('AdminUpdate', array("admin" => $admin, "errors" => $this->validateInput()));
				} 
				else
				{
				$this->updateAdminAccount($_POST["id"], $_POST["inputEmail"], $_POST["inputWachtwoord"], $_POST["inputVoornaam"], $_POST["inputAchternaam"], $_POST["inputGebruikersnaam"]);
				$admins = $this->getAdmins();
				$this->load->view('AdminOverzicht', array("admins" => $admins));
				}
				break;
		}
		
	}

	//admin methods

	private function getAdminAccount($id) {
		$query = "SELECT * FROM `admin` where adminId = $id";
		$admin = $this->_db->select($query, array(), false);
		return $admin;
	}

	private function getAdmins() {
		$query = "SELECT * FROM `admin`";
		$admins = $this->_db->select($query, array(), true);
		return $admins;
	}

	private function createAdminAccount($email, $wachtwoord, $voornaam, $achternaam, $gebruikersnaam) {
		$query = "INSERT INTO admin(email, wachtwoord, voornaam, achternaam, gebruikersnaam) VALUES (?, ?, ?, ?, ?)";
		$this->_db->command($query, array($email, $wachtwoord, $voornaam, $achternaam, $gebruikersnaam));
	}

	private function deleteAdminAccount($id)
	{
		$query = "DELETE FROM admin WHERE adminId = $id";
		$this->_db->command($query);
	}

	private function updateAdminAccount($adminId, $email, $wachtwoord, $voornaam, $achternaam, $gebruikersnaam)
	{
		$query = "UPDATE admin SET email = ?, wachtwoord = ?, voornaam = ?, achternaam = ?, gebruikersnaam = ? WHERE adminId = $adminId";
		$this->_db->command($query, array($email, $wachtwoord, $voornaam, $achternaam, $gebruikersnaam));
	}



	/**
	 * functie die de gegeven input checkt op geldigheid. Geeft een array terug met gevonden fouten in de vorm van strings met de volgende key-values:
	 * email, wachtwoord, voornaam, achternaam, gebruikersnaam. Geeft een lege array terug als geen fouten gevonden zijn.
	 * @return [array] [array met strings]
	 */
	private function validateInput()
	{
		//validate email
		$errors = array();

		if (!filter_has_var(INPUT_POST, "inputEmail"))
		{
			$errors["email"] = "dit veld is verplicht";
		}
		else
		{
			if (strlen($_POST["inputEmail"]) === 0)
			{
				$errors["email"] = "dit veld is verplicht";
			}
			if (!filter_input(INPUT_POST, "inputEmail", FILTER_VALIDATE_EMAIL))
			{
				$errors["email"] = "email is ongeldig";
			}
			else if (strlen($_POST["inputEmail"]) < 8 || strlen($_POST["inputEmail"]) > 100)
			{
				$errors["email"] = "email mag tussen 8 en 100 karakters bevatten";
			}
		}

		//validate wachtwoord
		if (!filter_has_var(INPUT_POST, "inputWachtwoord"))
		{
			$errors["wachtwoord"] = "dit veld is verplicht";
		}
		else
		{
			if (strlen($_POST["inputWachtwoord"]) < 8)
			{
				$errors["wachtwoord"] = "wachtwoord moet uit meer dan 8 karakters bestaan";
			}
		}

		//validate voornaam
		if (!filter_has_var(INPUT_POST, "inputVoornaam"))
		{
			$errors["voornaam"] = "dit veld is verplicht";
		}
		else
		{
			if (strlen($_POST["inputVoornaam"]) === 0)
			{
				$errors["voornaam"] = "dit veld is verplicht";
			}
			if (strlen($_POST["inputVoornaam"]) > 50)
			{
				$errors["voornaam"] = "voornaam mag uit maximaal 50 karakters bestaan";
			}
		}

		//validate achternaam
		if (!filter_has_var(INPUT_POST, "inputAchternaam"))
		{
			$errors["achternaam"] = "dit veld is verplicht";
		}
		else
		{
			if (strlen($_POST["inputAchternaam"]) === 0)
			{
				$errors["achternaam"] = "dit veld is verplicht";
			}
			if (strlen($_POST["inputAchternaam"]) > 50)
			{
				$errors["achternaam"] = "achternaam mag uit maximaal 100 karakters bestaan";
			}
		}

		//validate gebruikersnaam
		if (!filter_has_var(INPUT_POST, "inputGebruikersnaam"))
		{
			$errors["gebruikersnaam"] = "dit veld is verplicht";
		}
		else
		{
			if (strlen($_POST["inputGebruikersnaam"]) === 0)
			{
				$errors["gebruikersnaam"] = "dit veld is verplicht";
			}
			if (strlen($_POST["inputGebruikersnaam"]) > 45)
			{
				$errors["gebruikersnaam"] = "gebruikersnaam mag uit maximaal 45 karakters bestaan";
			}
		}

		return $errors;
	}

	private function getInput()
	{
		$input;

		if (isset($_POST["inputEmail"]))
		{
			$input["email"] = $_POST["inputEmail"];
		}
		if (isset($_POST["inputWachtwoord"]))
		{
			$input["wachtwoord"] = $_POST["inputWachtwoord"];
		}
		if (isset($_POST["inputVoornaam"]))
		{
			$input["voornaam"] = $_POST["inputVoornaam"];
		}
		if (isset($_POST["inputAchternaam"]))
		{
			$input["achternaam"] = $_POST["inputAchternaam"];
		}
		if (isset($_POST["inputGebruikersnaam"]))
		{
			$input["gebruikersnaam"] = $_POST["inputGebruikersnaam"];
		}

		return $input;
	}

}