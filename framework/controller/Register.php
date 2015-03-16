<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core, model;

class Register extends core\Controller {
	/**
	 * Defailt action
	 * @param  array  $params Params to be given to the page
	 */
	public function index() {
		$this->load->view('Register', array(
			"home" => "Dit is de eerste pagina!! "
		));
	}
}