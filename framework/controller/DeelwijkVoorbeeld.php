<?php

namespace controller;
use core;

class DeelwijkVoorbeeld extends core\Controller {
	public function index() {
		$this->load->view('De-laren', array(
		));
	}
}