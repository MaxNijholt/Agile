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

	private function updateProfile(){
		// if(isset($_POST['inputPassword'])){
		// 	if($_POST['inputPassword'] === $_POST['inputPasswordConfirm']){
		// 		$encryptedPass = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT, array('cost' => 10));
		// 		$update = $this->_db->command("UPDATE users (wachtwoord)
		// 		VALUES ('$encryptedPass')");
		// 	}else{
		// 		return 'pass';
		// 	}
		// }
		// 
		if(isset($_POST['inputPassword'])){
			$postalcode = $this->_settings->getUser()->postalcode;
			if($_POST['inputPassword'] === $_POST['inputPasswordConfirm']){
				$encryptedPass = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT, array('cost' => 10));
				$email = $_POST['inputPassword'];
				$query = "UPDATE users SET wachtwoord='{$encryptedPass}' WHERE postcode = '{$postalcode}';";
				$update = $this->_db->command($query);
			} else {
				return 'pass';
			}
		}
		
		if(isset($_POST['inputEMail'])){
			$oldEMail = $this->_settings->getUser()->email;
			if($_POST['inputEMail'] === $_POST['inputEMailConfirm']){
				$email = $_POST['inputEMail'];
				$query = "UPDATE users SET email='{$email}' WHERE email = '{$oldEMail}';";
				$update = $this->_db->command($query);
				$_SESSION['user']->email = $email;
			} else {
				return 'mail';
			}
		}
		
		if(isset($_POST['inputFirstName'])){
			$oldFirstname = $this->_settings->getUser()->firstname;
			$firstname = $_POST['inputFirstName'];
			$query = "UPDATE users SET voornaam='{$firstname}' WHERE voornaam = '{$oldFirstname}';";
			$update = $this->_db->command($query);
			$_SESSION['user']->firstname = $firstname;
		}

		if(isset($_POST['inputLastName'])){
			$oldLastname = $this->_settings->getUser()->lastname;
			$lastname = $_POST['inputLastName'];
			$query = "UPDATE users SET voornaam='{$lastname}' WHERE achternaam = '{$oldLastname}';";
			$update = $this->_db->command($query);
			$_SESSION['user']->lastname = $lastname;
		}

      	header('Location: /Userprofile');

	}
}