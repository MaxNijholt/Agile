<?php

namespace controller;
use core;

class Dashboard extends core\Controller {
	
	private $_DashboardItems = array();
	
	public function index() {

		$this->load->model('DashboardItem', null);
		$_DashboardItemDummy = new DasboardItem();
		$_DashboardItemDummy->setIcon('fa fa-question-circle fa-5x');
		$_DashboardItemDummy->setID(1);
		$_DashboardItemDummy->setText('Voorbeeld');
		$_DashboardItemDummy->setLink('#');
		$_DashboardItemDummy->setPanel('panel panel-primary');
		
		$this->_DashboardItems[0] = $_DashboardItemDummy;
		$this->load->view('Dashboard', $this->_DashboardItems);

	}
}