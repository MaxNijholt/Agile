<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core;

class Home extends core\Controller {
	public function index() {
		$this->load->view('Home', array(
			"home" => "Dit is de eerste pagina!! "
		));
	}
}
?>