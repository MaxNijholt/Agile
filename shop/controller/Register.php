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
	public function index($post = "/register") {

		$status = null;
		$message = "";

		// If someone is logged in, they do not need to sign up again.
		if($this->_settings->getUser() != false) {
			header("Location: /home");
			return;
		}

		// Check if the register form is posted or not
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			if(false === ($user = $this->_handlePost($status, $message))) {	
				unset($_SESSION['user']);
			} else {
				$_SESSION['user'] = $user->getID();			
				if ($post == "/cart/checkout/register"){
					header("Location: /cart/checkout");
				} else {
					header("Location: /home");
				}
			}
		}

		$this->load->view('register', array(
			'status' => $status,
			'message' => $message,
			'post' => $post
		));
	}

	/**
	 * Method to check if a certain email address is valid and still available
	 */
	public function check() {
		$response = array(
			'error' => true,
			'response' => false
		);

		if(isset($_GET['mail']) && strlen($_GET['mail']) > 0
		&& filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL)) {
			$response['error'] = false;
			$q = htmlspecialchars(addslashes(@$_GET['mail']));
			$u = new model\User();
			if(!$u->loadByMail($q))
				$response['response'] = true;
		}

		echo json_encode($response);
	}


	/**
	 * Method which handles the register form post
	 * @return Boolean True: if succeeded, False: otherwise
	 */
	private function _handlePost(&$status, &$message) {
		try {
			$usr = new model\User();

			// Check if the email is any good and still available
			if(!isset($_POST['email']) || strlen($_POST['email']) < 1
			|| (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
				$status = 'danger';
				$message = 'U dient een geldig e-mail adres op te geven.';
				return false;
			}

			$mail = htmlspecialchars(addslashes($_POST['email']));
			if($usr->loadByMail($mail)) {
				$status = 'danger';
				$message = 'Dit e-mail adres is al in gebruik, gebruik een ander e-mail adres of <a href="/login">login in</a>.';
				return false;
			}

			$usr->setMail($_POST['email']);
			$usr->setPass($_POST['password-repeat']);
			$usr->setTel($_POST['tel']);
		} catch(\Exception $e) {
			$status = 'danger';
			$message = $e->getMessage();
			return false;
		}

		if($usr->save()) {
			try {
				$adr = new model\Address();
				$adr->setStreet1($_POST['street1']);
				$adr->setStreet2($_POST['street2']);
				$adr->setZipcode($_POST['zipcode']);
				$adr->setCity($_POST['city']);
				$adr->setState($_POST['state']);
				$adr->setCountry($_POST['country']);
				$adr->setUser($usr->getID());
			} catch(\Exception $e) {
				$status = 'danger';
				$message = $e->getMessage();
				return false;
			}

			if ($adr->save()){
				$status = 'success';
				$message = 'U bent met succes geregistreerd. Klik <a href="/login">hier</a> om in te loggen.';
				return $usr;
			} else {
				$status = 'danger';
				$message = 'Helaas is er iets misgegaan met het registreren. Probeert u het nogmaals.';
				return false;
			}
		} else {
			$status = 'danger';
			$message = 'Helaas is er iets misgegaan met het registreren. Probeert u het nogmaals.';
			return false;
		}
	}
}