<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core;

class Logout extends core\Controller {
	// /products
	public function index($params = array()) {
		session_destroy();
		//$this->load->view('logout');
		header('Location: /');
	}
}