<?php

namespace controller;
use core, model;

class Dashboard extends core\Controller {
	
	private $_DashboardItems = array();
	
	public function index() {

		$_DashboardItemDummy = $this->load->model('DashboardItem');
		$_DashboardItemDummy->setIcon('fa fa-question-circle fa-5x');
		$_DashboardItemDummy->setID(1);
		$_DashboardItemDummy->setText('Voorbeeld');
		$_DashboardItemDummy->setLink('#');
		$_DashboardItemDummy->setPanel('panel panel-primary');
		$_DashboardItemDummy->setUser('1');
		
		$this->_DashboardItems[0] = $_DashboardItemDummy;
		$this->load->view('Dashboard', array('_DashboardItems' => $this->_DashboardItems ));

	}
}