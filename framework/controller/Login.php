<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core, model;

class Login extends core\Controller {
	public function index($action = '') {

		if ($action === '') {
			$this->load->view('Login', array(
			"error" => ""
			));
		}
		
		if ($action === 'validate') {
			$result = $this->validateForm();

			if ($result !== 'success') {
				$this->load->view('Login', array(
					"error" => $result
				));
			}
			else {
				header('Location: /');
			}
		}
	}

	private function validateForm() {
		$QueryPass = "SELECT voornaam, achternaam, wachtwoord FROM users WHERE huisnummer = '" . $_POST['houseNumber'] . "' AND postcode = '" . $_POST['postalCode'] . "';";
		$encryptedPass = password_hash($_POST['password'], PASSWORD_DEFAULT, array('cost' => 10));

		$databPass = $this->_db->select($QueryPass);


		if (is_null($databPass['wachtwoord'])) {
			echo "test1";
			return 'posthuis';
		}
		else {
			if (password_verify($_POST['password'], $databPass['wachtwoord'])) {
				$_SESSION['postalCode'] = $_POST['postalCode'];
				$_SESSION['houseNumber'] = $_POST['houseNumber'];
				$_SESSION['firstname'] = $databPass['voornaam'];
				$_SESSION['lastname'] = $databPass['achternaam'];
				$_SESSION['loggenIn'] = true;
				return 'success';
			}
			else {
				return 'wachtwoord';
			}
		}

	}
}