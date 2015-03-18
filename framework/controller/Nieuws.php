<?php

namespace controller;
use core;

class Nieuws extends core\Controller {
	public function index() {
		$this->load->view('Nieuws', array(
			"home" => "Dit is de eerste pagina!! "
		));
	}
}