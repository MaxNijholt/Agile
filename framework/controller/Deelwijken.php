<?php

namespace controller;
use core;

class Deelwijken extends core\Controller {
	public function index() {
		$this->load->view('De-laren', array(
		));
	}

	public function deLaren() {
		$this->load->view('DeelwijkOverzicht', array(
		));
	}
}