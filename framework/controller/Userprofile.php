<?php

namespace controller;
use core, model;

class UserProfile extends core\Controller {
	
	public function index($action = '') {
		$localuser = $this->_settings->getUser();
		if($action === ''){

			$this->load->view('Userprofile', 
				[
					'user' => $localuser , 
					'error' => ""  
				]
			);

		}
		if($action === 'update'){
			$result = $this->updateProfile();

			if ($result !== 'success') {
				$this->load->view('Userprofile', array('user' => $localuser, 'error' => $result ));
			}
			else {
				header('Location: /');
			}
		}
	}

	/**
	 * Update user in DB and in the session.
	 * @return Error when something is wrong
	 */
	private function updateProfile(){
		if(isset($_POST['inputPassword'])){
			$postalcode = $this->_settings->getUser()->postalcode;
			if($_POST['inputPassword'] === $_POST['inputPasswordConfirm']){
				$encryptedPass = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT, array('cost' => 10));
				$this->_db->command("UPDATE users SET wachtwoord = :pass WHERE postcode = :zip", array(
					':pass' => $encryptedPass,
					':zip' => $postalcode
				));
			} else {
				return 'pass';
			}
		}
		
		if(isset($_POST['inputEMail'])){
			$oldEMail = $this->_settings->getUser()->email;
			if($_POST['inputEMail'] === $_POST['inputEMailConfirm']){
				$email = $_POST['inputEMail'];
				$this->_db->command("UPDATE users SET email = :email WHERE email = :oldmail", array(
					':email' => $email,
					':oldmail' => $oldEmail
				));
				$_SESSION['user']->email = $email;
			} else {
				return 'mail';
			}
		}
		
		if(isset($_POST['inputFirstName'])){
			$oldFirstname = $this->_settings->getUser()->firstname;
			$firstname = $_POST['inputFirstName'];
			$this->_db->command("UPDATE users SET voornaam = :firstname WHERE voornaam = :oldFirstname", array(
					':firstname' => $firstname,
					':oldFirstname' => $oldFirstname
				));
			$_SESSION['user']->firstname = $firstname;
		}

		if(isset($_POST['inputLastName'])){
			$oldLastname = $this->_settings->getUser()->lastname;
			$lastname = $_POST['inputLastName'];
			$this->_db->command("UPDATE users SET lastname = :lastname WHERE lastname = :oldLastname", array(
					':lastname' => $lastname,
					':oldLastname' => $oldLastname
				));
			$_SESSION['user']->lastname = $lastname;
		}

      	header('Location: /Userprofile');

	}
}