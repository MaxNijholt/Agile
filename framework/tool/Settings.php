<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace tool;
use model;

class Settings extends Singleton {

	/* Private variables */
	private $_settings;
	private $_user = false;

	/**
	 * Gets a setting
	 * @param  String $key   The key of the setting to be returned
	 * @param  String $scope Optionally, the scope to search in
	 * @return String        The value attached to the key
	 */
	public function get($key, $scope = null) {
		if(($scope == null && !isset($this->_settings[$key]))
		|| ($scope != null && !isset($this->_settings[$scope][$key])))
			throw new \Exception("Setting '{$key}' is not defined", 01);

		return ($scope == null) ? $this->_settings[$key] : $this->_settings[$scope][$key];
	}

	/**
	 * Method to set a setting
	 * @param String $key   The key that defines the setting
	 * @param String $value The value belonging to the key
	 */
	public function set($key, $value) {
		return $this->_settings[$key] = $value;
	}
	

	/**
	 * Constructor
	 */
	public function __construct() {
		// Load JSON config file
		if(false !== ($json = @file_get_contents($_SERVER['DOCUMENT_ROOT'] . 'shop/config.json'))) {
			if(null !== ($json = @json_decode($json, true))) {
				$this->_settings = $json;
			} else {
				throw new \Exception("There was an error while parsing the settings file: " . json_last_error(), 02);
			}
		} else {
			throw new \Exception("Could not load settings file.", 03);
		}
	}

	/**
	 * Dirty method to get the current user
	 * @return [type] [description]
	 */
	public function getUser() {
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])
		&& is_numeric($_SESSION['user']) && $_SESSION['user'] > 0) {
			if($this->_user != false && $_SESSION['user'] == $this->_user->getID()) {
				return $this->_user;
			} else {
				return ($this->_user = new model\User($_SESSION['user']));
			}
		}

		return false;
	}

	/**
	 * Method to check if a setting exists
	 * @param  String  $key   The key to lookup
	 * @param  String  $scope Optionally, the scope to search in
	 * @return Boolean        True: if exists, False: otherwise
	 */
	public function exists($key, $scope = null) {
		return ($scope == null) ? isset($this->_settings[$key]) : isset($this->_settings[$scope][$key]);
	}

	/**
	 * Method to remove database credentials from the settings object
	 */
	public function remove_db() {
		unset($this->_settings['database']);
	}
}