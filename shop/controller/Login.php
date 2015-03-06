<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core, model;

class Login extends core\Controller {
	public function index($post = "/login", $register = "/register") {
		if($this->_settings->getUser() != false) {
			header("Location: /account");
		} else {
			$status = 'info';
			$message = "Log in met uw gegevens.";

			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if(false === ($user = $this->_handlePost($status, $message))) {
					unset($_SESSION['user']);
				} else {
					$_SESSION['user'] = $user->getID();
					if ($post == "/cart/checkout") {
						header("Location: /cart/checkout");
					} else {
						header("Location: /account");
					}
				}
			}

			$this->load->view('login', array(
				'status' => $status,
				'message' => $message,
				'post' => $post,
				'register' => $register
			));
		}
	}


	/**
	 * Method to handle the submitted field.
	 * @return Mixed User: if login successful, False: otherwise
	 */
	private function _handlePost(&$status, &$message) {

		// Check if all fields are present, if so check if they have content
		if(!isset($_POST['email']) || !isset($_POST['password'])
		|| strlen($_POST['email']) < 1 || strlen($_POST['password']) < 1) {
			$status = "danger";
			$message = "Geef een e-mail adres en een wachtwoord op.";
			return false;
		}

		$email = htmlspecialchars(addslashes($_POST['email']));
		$password = htmlspecialchars(addslashes($_POST['password']));

		// Fields are OK, lets check the database
		$u = new model\User();
		if(!$u->checkMailPasswordMatch($email, $password)) {
			$status = "danger";
			$message = "Ongeldig email adres of wachtwoord.";
			return false;
		}

		if($u->loadByMail($email)) {
			$status = "success";
			$message = "U bent successvol ingelogd";
			return $u;
		}
		
		$status = "danger";
		$message = "Ongeldig email adres of wachtwoord.";
		return false;
	}

}