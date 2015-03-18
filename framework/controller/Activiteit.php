<?php

namespace controller;
use core;

class Activiteit extends core\Controller {
	public function index() {
		$this->load->view('Activiteit', array(
			'fout' => "Deze pagina bestaat niet."
		));
	}
}