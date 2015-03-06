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
		unset($_SESSION['user']);
		$this->_settings->getUser();
		$this->load->view('logout');
	}
}