<?php


namespace controller;
use core;


class Dashboardtemp extends core\Controller {
	public function index() {

		if (!isset($_SESSION["adminUsername"]))
		{
			header("location: Adminlogin");
		}

		$this->load->view('Dashboardtemp', array(
			'fout' => "Deze pagina bestaat niet."
		));


	}

}