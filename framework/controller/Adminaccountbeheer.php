<?php

namespace controller;
use core;

class Discussie extends core\Controller {
	public function index() {
		$admins = adminAccount::getAdminAccounts();

		$this->load->view('Adminbeheer/Overzicht', array(
			"admins" => "$admins "
		));
	}
}