<?php

namespace controller;
use core, model;

class UserProfile extends core\Controller {
	
	public function index() {
		echo "<pre>";
		print_r($this);
		echo "</pre>";

		$this->load->view('Userprofile',  array('user' => $_SESSION['user'] ));

	}
}