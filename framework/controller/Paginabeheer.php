<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */
namespace controller;
use core;
class Paginabeheer extends core\Controller {
	public function index($action = 'pages') {
		/*
		Sectie voor het weergeven van de verschillende pagina's
		 */
		if ($action === 'pages') {
			$this->load->view('sortable', array(
			"resultset" => $this->getPostalCodes(true),
			"next" => $start + 1
			));
		}
		if($action === 'edit'){
			
		}
	}

	private function getPages($enabled) {
		$query = "SELECT * FROM `navigation` WHERE pag_enabled = :enabled;";
		$pages = $this->_db->select($query,array(
			':enabled' => $enabled
			),true);
		return $pages;
	}

	private function removePage() {
		$query = "DELETE FROM `navigation` WHERE pag_id = '" . $_POST['pageid'] . "' AND pag_title = '" . $_POST['pagetitel'] . "';";
		try {
			$this->_db->command($query);
			return 'success';
		} catch (Exception $e) {
			return 'error';
		}
	}
	private function editPage() {
		$query = "
			UPDATE `navigation` 
			SET pag_name='" . $_POST['pag_name'] . "', pag_title='" . $_POST['pag_title'] . "' 
			WHERE pag_name='" . $_POST['ori_pag_name'] . "' AND pag_title='" . $_POST['ori_pag_title'] . "';";
		
		try {
			$this->_db->command($query);
			return 'editsuccess';
		} catch (Exception $e) {
			return 'editerror';
		}
	}

	private function editPageNavigation() {
		$query = "
			UPDATE `navigation` 
			SET pag_sort='" . $_POST['pag_sort'] . "', pag_parent='" . $_POST['pag_parent'] . "', pag_enabled='" . $_POST['pag_enabled'] . "' 
			WHERE pag_name='" . $_POST['pag_name'] . "' AND pag_title='" . $_POST['pag_title'] . "';";

		try {
			$this->_db->command($query);
			return 'editsuccess';
		} catch (Exception $e) {
			return 'editerror';
		}
	}

	private function updateParent(){

	}

	private function setEnabled(){

	}

	private function createPage() {
		$query = "INSERT INTO `navigation` VALUES ('" . $_POST['page_name'] . "','" . $_POST['page_title'] . "',0,0,0);";
		$checkQuery = "SELECT * FROM `navigation` WHERE pag_name='" . $_POST['page_name'] . "' AND pag_title='" . $_POST['page_title'] . "';";
		
		$checkResult = $this->_db->select($checkQuery);
		if (is_null($checkResult)) {
			try {
			$this->_db->command($query);
			return 'createsuccess';
			} catch (Exception $e) {
			return 'createerror';
			}
		}
		else {
			return 'existingerror';
		}
		
	}
}