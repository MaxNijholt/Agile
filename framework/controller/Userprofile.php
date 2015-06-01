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
		//doStuff to update profile
	}
	/*
	<?php include 'inc/header.inc.php'; ?>
	<?php include 'inc/nav.inc.php'; ?>
	 */
}