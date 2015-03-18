<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core, model;

class Register extends core\Controller {
	/**
	 * Defailt action
	 * @param  array  $params Params to be given to the page
	 */
	public function index($action = '') {

		if ($action === 'validate') {
			$result = $this->validateForm();

			if ($result !== 'success') {
				$this->load->view('Register', array(
					"error" => $result
				));
			}
			else {
				header('Location: /');
			}
		}

		if ($action === '') {
			$this->load->view('Register', array(
			"error" => ""
		));
		}
	}

	private function validateForm() {
		$huisnummerfalse;

		$postalCodes = $this->_db->select("SELECT postcode, huisnummer FROM `postcode-check` WHERE postcode = :postcode;", array(
			':postcode' => $_POST['inputPostalCode']
		));

		// Controlleer de ingevulde gegevens
		// 
		//
		//echo '<pre>';
		//print_r($postalCodes);
		
		//echo $_POST['inputHomeNumber'];

		if (is_null($postalCodes[0])) {
			// postcode klopt niet
			return 'postcode';
		}
		else{
			foreach ($postalCodes as $key => $value) {
				// postcode klopt wel
				//print_r($postalCodes);
				if ($value['huisnummer'] !== $_POST['inputHomeNumber']) {
					return 'huisnummer';
				}
				else{
					//echo "<br />huisnummer";
					if ($_POST['inputEmail'] === $_POST['inputEmailConfirm']) {
						$this->registerUser();
					}
					else{
						return 'email';
					}

				}
			}
		}
	}

	private function registerUser() {
		$encryptedPass = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT, array('cost' => 10));
		$postcode = $_POST['inputPostalCode'];
		$huisnummer = $_POST['inputHomeNumber'];
		$email = $_POST['inputEmail'];

		$postalCodes = $this->_db->command("INSERT INTO users (postcode, huisnummer, email, wachtwoord)
			VALUES ('$postcode', '$huisnummer', '$email', '$encryptedPass')");

      	header('Location: /');

	}
}