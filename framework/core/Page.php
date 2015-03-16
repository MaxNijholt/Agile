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

		//try {
			$class = "controller\\".ucfirst(array_shift($this->_url));
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
				$this->_controller = new controller\Error();
				$this->_controller->index();
			}
		// } catch(\Exception $e) {
		// 	$this->_controller = new controller\Error();
		// 	$this->_controller->index();
		// }
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