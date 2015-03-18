<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core, model;

class Test extends core\Controller {
	public function index() {

		$this->load->view('login', array(
			'status' => 'Please login to continue.'
		));
	}
}