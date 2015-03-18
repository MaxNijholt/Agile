<?php

namespace controller;
use core;

class Discussie extends core\Controller {
	public function index() {
		$this->load->view('Discussie', array(
			"home" => "Dit is de eerste pagina!! "
		));
	}
}