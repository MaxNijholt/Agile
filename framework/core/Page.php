<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace core;
use controller;

class Page extends Base {

	/* Private Variables */
	private $_url = array();
	private $_controller = null;

	/**
	 * Method to set the URL of the current page that is requested
	 * @param String $value The URL
	 */
	public function setURL($value) {
		$this->_url = $value;
	}

	/**
	 * Constructs a new page
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Method to build a certain page
	 */
	public function build() {
		$this->resolveUrl();

		if(defined('DEBUG_MODE') && DEBUG_MODE) {
			$this->resolveController();
		} else {
			try {
				$this->resolveController();
			} catch(\Exception $e) {
				$this->_controller = new controller\Error();
				$this->_controller->index();
			}
		}
	}

	/**
	 * Method which resolves an URL to an existing controller, otherwise giving an Error 404
	 * @return [type] [description]
	 */
	private function resolveController() {
		$class = "controller\\".ucfirst(strtolower(array_shift($this->_url)));
		if (class_exists($class)) {
			$this->_controller = new $class();
			if (count($this->_url) > 0) {
				$call = "index";
				if (method_exists($this->_controller, $this->_url[0])){
					$call = array_shift($this->_url);
				}
				$method = new \ReflectionMethod($this->_controller, $call);
				if (count($this->_url) >= $method->getNumberOfRequiredParameters()){
					call_user_func_array(array($this->_controller, $call), $this->_url);
				} else {
					$this->_controller->index();
				}
			} else {
				$this->_controller->index();
			}
		} else {
			// Ugly bulky code, but very efficient and effective.
			try {
				$previous = $url[count($url) - 1];
				$select = "SELECT `" . $previous . "`.pag_id FROM page as `" . $previous . "` ";
				$where = " WHERE `" . $previous . "`.pag_name = '" . $previous . "'";
				for ($i = count($url) - 2; $i >= 0; $i--) { 
					$select .= " JOIN page as `" . $url[$i] . "` ON `" . $previous . "`.pag_parent = `" . $url[$i] . "`.pag_id";
					$previous = $url[$i];
					$where .= " AND `" . $previous . "`.pag_name = '" . $previous . "'";
				}

				if($page = $this->_db->select($select . $where . " AND `" . $previous . "`.pag_parent IS NULL AND pag_enabled = 1;")) {
					$type = "controller\\" . $page["pag_type"];
					$this->_controller = new $type();
					$this->_controller->index($page["pag_id"]);
				} else {
					$this->_controller = new controller\Error();
					$this->_controller->index();
				}
			} catch(\Exception $e) {
			 	$this->_controller = new controller\Error();
			 	$this->_controller->index();
			}
		}
	}

	/**
	 * Method to resolve an URL to a certain page
	 */
	private function resolveUrl() {
		if($this->_url == null || $this->_url == '') 
			$this->_url = "home";

		$this->_url = explode('/', trim($this->_url, '/'));
	}
}