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
		if(isset($_POST['inputPassword'])){
			if($_POST['inputPassword'] === $_POST['inputPasswordConfirm']){
				$encryptedPass = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT, array('cost' => 10));
				$update = $this->_db->command("UPDATE users (wachtwoord)
				VALUES ('$encryptedPass')");
			}else{
				return 'pass';
			}
		}
		
		if(isset($_POST['inputEmail'])){
			if($_POST['inputEmail'] === $_POST['inputEmailConfirm']){
				$update = $this->_db->command("UPDATE users (email)
				VALUES ('$email')");
				$_SESSION['user']->email = $_POST['inputEmail'];
			}else{
				return 'mail';
			}
		}
		if(isset($_POST['inputFirstName'])){
			$firstname = $_POST['inputFirstName'];
			$update = $this->_db->command("INSERT INTO users (voornaam)
			VALUES ('$firstname')");
			$_SESSION['user']->firstname = $_POST['inputFirstName'];
		}
		if(isset($_POST['inputLastName'])){
			$lastname = $_POST['inputLastName'];
			$update = $this->_db->command("INSERT INTO users (achternaam)
			VALUES ('$lastname')");
			$_SESSION['user']->lastname = $_POST['inputLastName'];
		}

      	header('Location: /Userprofile');

	}
}