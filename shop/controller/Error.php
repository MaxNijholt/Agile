<?php
/**
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core;

class Error extends core\Controller {
	public function index() {
		$this->load->view('Error', array(
			'fout' => "Deze pagina bestaat niet."
		));
	}
}