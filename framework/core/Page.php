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
		$class = "controller/".$this->_url[count($this->_url) - 1];
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/framework/' . $class . '.php')) {
			$class = str_replace('/', '\\', $class);
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
				$previous = $this->_url[count($this->_url) - 1];
				$select = "SELECT `" . $previous . "`.pag_id, `" . $previous . "`.pag_type FROM page as `" . $previous . "` ";
				$where = " WHERE `" . $previous . "`.pag_name = '" . $previous . "'";
				for ($i = count($this->_url) - 2; $i >= 0; $i--) { 
					$select .= " JOIN page as `" . $this->_url[$i] . "` ON `" . $previous . "`.pag_parent = `" . $this->_url[$i] . "`.pag_id";
					$previous = $this->_url[$i];
					$where .= " AND `" . $previous . "`.pag_name = '" . $previous . "'";
				}

				$sql = $select . $where . " AND `" . $previous . "`.pag_parent IS NULL AND `" . $previous . "`.pag_enabled = 1;";

				if($page = $this->_db->select($sql)) {
					$type = "controller\\Pages\\" . ucfirst($page["pag_type"]);
					$this->_controller = new $type();
					$this->_controller->index($page["pag_id"]);
				} else {
					$this->_controller = new controller\Error();
					$this->_controller->index();
				}
			} catch(\Exception $e) {
				if(@DEBUG_MODE)  {
					echo '<pre>'; print_r($e); echo '</pre>';
				} else {
				 	$this->_controller = new controller\Error();
				 	$this->_controller->index();
				}
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