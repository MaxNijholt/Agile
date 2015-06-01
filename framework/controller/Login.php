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
		$QueryPass = "SELECT id, wachtwoord FROM users WHERE huisnummer = '" . $_POST['houseNumber'] . "' AND postcode = '" . $_POST['postalCode'] . "';";
		$encryptedPass = password_hash($_POST['password'], PASSWORD_DEFAULT, array('cost' => 10));

		$databPass = $this->_db->select($QueryPass);


		if (is_null($databPass['wachtwoord'])) {
			//echo "test1";
			return 'posthuis';
		}
		else {
			if (password_verify($_POST['password'], $databPass['wachtwoord'])) {
				$this->_user = $this->load->model('user', $databPass['id']);
				$_SESSION['loggenIn'] = true;
				$_SESSION['userid'] = $databPass['id'];
				$_SESSION['user'] = new \stdClass();
				$_SESSION['user']->firstname = $this->_user->getFirstname();
				$_SESSION['user']->lastname = $this->_user->getLastname();
				$_SESSION['user']->email = $this->_user->getEMail();
				$_SESSION['user']->housenumber = $this->_user->getHouseNumber();
				$_SESSION['user']->postalcode = $this->_user->getPostcode();
				$_SESSION['user']->id = $this->_user->getID();
				var_dump($_SESSION['user']);
				return 'success';
			}
			else {
				return 'wachtwoord';
			}
		}

	}
}