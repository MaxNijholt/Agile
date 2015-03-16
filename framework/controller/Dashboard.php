<? php

namespace controller;
use core;

class Home extends core\Controller {
	public function index() {
		$this->load->view('Home', array(
			"home" => "Dit is de eerste pagina!! "
		));
	}
}