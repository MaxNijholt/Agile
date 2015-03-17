<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace core;
use tool, model;

abstract class Base {

	/* Public Variables */
	public $_settings;
	public $_db;
	public $_user = false;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->_settings = tool\Settings::getInstance();
		$this->_db = new tool\Database("robin.tjosti.nl");

		if($this->_settings->exists('hostname', 'database')) {
			

			// Remove the db values, so nobody sees them on an unexpected error.
			$this->_settings->remove_db();
		}
	}
}