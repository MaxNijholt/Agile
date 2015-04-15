<?php

namespace model;
use core;

class Page extends core\Model {

	/* Public Vars */
	/* Private Vars */
	private $_id = null;
	private $_name;
	private $_title;
	private $_order;
	private $_layouts = array();

	/**
	 * Method to get the id of the page
	 * @return String 			The page id
	 */
	public function getId() {
		return $this->_id;
	}

	/**
	 * Method to set the name of the page
	 * @param String 	$value 	The name of the page
	 */
	public function setName($value) {
		$this->_name = $value;
	}

	/**
	 * Method to get the name of the page
	 * @return String 			The page name
	 */
	public function getName() {
		return $this->_name;
	}

	/**
	 * Method to set the title of the page
	 * that should be loaded by Volt.
	 * @param String 	$value 	The title of the page
	 */
	public function setTitle($value) {
		$this->_title = $value;
	}

	/**
	 * Method to get the title of the page
	 * @return String 			The page title
	 */
	public function getTitle() {
		return $this->_title;
	}

	/**
	 * Method to set the order of the page
	 * @param String 	$value 	The order of the page
	 */
	public function setOrder($value) {
		$this->_order = $value;
	}

	/**
	 * Method to get the order of the page
	 * @return String 			The page order
	 */
	public function getOrder() {
		return $this->_order;
	}

	/**
	 * Method to get all pages and there children
	 * @return Array 			All pages and there children
	 */
	public function getChildren($parentId = null){
		$array = array();

		if ($parentId == null){
			$where = "pag_parent_id IS NULL";
			$params = array();
		} else {
			$where = " pag_parent_id = :id";
			$params = array(":id" => $parentId);
		}
		foreach ($this->_db->select("SELECT pag_id, pag_name, pag_title FROM page WHERE "+$where+" ORDER BY pag_order", $params, true) as $record) {
			$array[$record['pag_id']] = array();
			$array[$record['pag_id']]['name'] = $record['pag_name'];
			$array[$record['pag_id']]['title'] = $record['pag_title'];
			$array[$record['pag_id']]['children'] = $this->get_children($record['pag_id']);
		}

		return $array;
	}

	/**
	 * Constructor
	 * @param Int 		$id 		The id of the page
	 */
	public function __construct($id = null) {
		parent::__construct();
		if($id != null) {
			$this->_id = $id;
			$this->load();
		}
	}

	/**
	 * Method to load the page
	 */
	public function load() {
		if ($result = $this->_db->select("SELECT pag_name, pag_title, pag_order FROM page WHERE pag_id = :id", array(":id" => $this->_id ))) {
			$this->_name = $result['pag_name'];
			$this->_title = $result['pag_title'];
			$this->_order = $result['pag_order'];

			//$this->_loadLayouts();
		} else {
			throw new \Exception("Failed to load page", 01);
		}
	}

	/**
	 * Method to save the page
	 */
	public function save() {
		if ($result = $this->_db->command("INSERT INTO page (pag_id, pag_name, pag_title, pag_order) VALUES(:id, :name, :title, :order) ON DUPLICATE KEY UPDATE pag_name = :name, pag_title = :title, pag_order = :order", array(":id" => $this->_id,":name" => $this->_name,":title" => $this->_title,":order" => $this->_order ), true)){
			if ($result["lastInsertId"] != false) {
				$this->_id = $result["lastInsertId"];
			}

			foreach($_layouts as $layout){
				$layout->save();
			}
		} else {
			throw new \Exception("Failed to save page", 02);
		}
	}
}