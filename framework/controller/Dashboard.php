<? php

namespace controller;
use core;

class Home extends core\Controller {
	public function index() {
		private $_DashboardItems = null;
			$this->load->view('Dashboard', $_DashboardItems
		));
	}
}