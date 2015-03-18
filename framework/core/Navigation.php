<?php
/**
 * @author Stephan Römer info@stephanromer.nl
 */

namespace core;
use controller;

final class Navigation extends Base {

	/**
	 * Method to get the menu tree
	 * @return [type] [description]
	 */
	public function getTree() {
		return $this->_getChildren();
	}

	public function getPrettyTree($array = null) {
		$ul = '<ul>';
		foreach (($array == null) ? $this->_getChildren() : $array as $key => $value) {
			$ul .= '<li><a href="' . $value['url'] . '">' . $value['title'] . '</a></li>';
			$ul .= $this->getPrettyTree($value['children']);
		}
		return $ul . '</ul>';
	}

	/**
	 * Method to get all pages and there children
	 * @return Array All pages and there children
	 */
	private function _getChildren($parentId = null, $parentName = ""){
		$array = array();

		if ($parentId == null){
			$where = "pag_parent_id IS NULL";
			$params = array();
		} else {
			$where = " pag_parent = :id";
			$params = array(":id" => $parentId);
		}
		foreach ($this->_db->select("SELECT pag_id, pag_name, pag_title FROM page WHERE ".$where." AND pag_enabled = 1 ORDER BY pag_order", $params, true) as $record) {
			$array[$record['pag_id']] = array();
			$array[$record['pag_id']]['id'] = $record['pag_id'];
			$array[$record['pag_id']]['url'] = $this->_domain.$parentName."/".$record['pag_name'];
			$array[$record['pag_id']]['title'] = $record['pag_title'];
			//$array[$record['pag_id']]['active'] = ($record['pag_id'] == $this->_page->getId()) ? "active" : "";
			$array[$record['pag_id']]['children'] = $this->_getChildren($record['pag_id'], $parentName."/".$record['pag_name']);
		}

		return $array;
	}
}