<?php

namespace controller;
use core;

class Contact extends core\Controller {
	public function index() {
		$this->load->view('Contact', array(
			'fout' => "Deze pagina bestaat niet."
		));
	}
}