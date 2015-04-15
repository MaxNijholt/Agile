<?php

namespace controller;
use core;

class Zoeken extends core\Controller {
	public function index() {
		$this->load->view('Zoeken', array(
			'pages' => array()
		));
	}

	public function search() {


		

		$word = $_POST['word'];
		$word = "%" . $word . "%"; 
		$result = array();

		if(false !== ($pages = $this->_db->select("SELECT * FROM `page` WHERE pag_title LIKE :word ", array(':word' => $word), true))) {
			foreach ($pages as $key => $page) {
				$pag = $this->load->model('Page', $page['pag_id']);
				//$pag = new Page($page["pag_id"]);
				$pag->load();

				$result[$pag->getId()] = $pag;
			}
		}


		$this->load->view('Zoeken', array(
			'pages' => $result));

	}
}