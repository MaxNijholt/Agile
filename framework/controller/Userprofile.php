<?php

namespace controller;
use core, model;

class UserProfile extends core\Controller {
	
	public function index($action = '') {
		echo "<pre>";
		print_r($this);
		echo "</pre>";
		$localuser = $this->load->model('user', $_SESSION('userid'));
		if($action === ''){
			$this->load->view('Userprofile', array($_user , "error" => "" ));
		}
		if($action === 'update'){
			$result = $this->updateProfile();

			if ($result !== 'success') {
				$this->load->view('Userprofile', array($_user, "error" => $result ));
			}
			else {
				header('Location: /');
			}
		}
	}

	private function updateProfile(){
		//doStuff to update profile
	}
}