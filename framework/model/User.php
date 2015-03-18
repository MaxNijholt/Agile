<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace model;
use core;

/**
 * Specifies a certain product
 */
class User extends core\Model {

	/* Private variables */
	private $_id = null;
	private $_mail = null;
	private $_pass = null;
	private $_salt = null;
	private $_tel = null;
	private $_isAdmin = false;
	private $_lastlogin = null;
	private $_address = array();

	/**
	 * Method to get the id of this user
	 * @return Integer The ID
	 */
	public function getID() {
		return $this->_id;
	}

	/**
	 * Method to get the mail of this user
	 * @return String The mail
	 */
	public function getMail() {
		return $this->_mail;
	}

	/**
	 * Method to get the tel of this user
	 * @return Integer The tel
	 */
	public function getTel() {
		return $this->_tel;
	}

	/**
	 * Method to get the last time this user has logged in
	 * @return String The last login timestamp
	 */
	public function getLastLogin() {
		return $this->_lastlogin;
	}

	/**
	 * Method to get the addresses of this user
	 * @return Address The address
	 */
	public function getAddress() {
		return $this->_address;
	}

	/**
	 * Method to get the orders of this users
	 * @return Array The array of Orders
	 */
	public function getOrders() {
		$orde = array();
		if(false !== ($orders = $this->_db->select("SELECT * FROM `order` WHERE ord_usr_id = :id ORDER BY ord_timestamp DESC;", array(':id' => $this->_id), true))) {
			foreach ($orders as $key => $order) {
				$ord = new Order($order["ord_id"]);
				$orde[$ord->getID()] = $ord;
			}
		}
		return $orde;
	}

	/**
	 * Method to check if this user is an Admin user.
	 * @return Boolean True: if this user is Admin, False: otherwise
	 */
	public function isAdmin() {
		return $this->_isAdmin;
	}

	/**
	 * Method to set the ID of this user
	 * @param Integer $value The ID
	 */
	public function setID($value) {
		if(false === ($value = $this->checkField($value, 'int', 1)))
			throw new \Exception("U dient een nummer in te vullen.");

		$this->_id = $value;
	}

	/**
	 * Method to set the mail of this user
	 * @param String $value The mail
	 */
	public function setMail($value) {
		if (!filter_var($value, FILTER_VALIDATE_EMAIL))
			throw new \Exception("U dient een geldig e-mail adres op te geven.");

		$this->_mail = $value;
	}

	/**
	 * Method to set the pass for this user
	 */
	public function setPass($value) {
		if(false === ($value = $this->checkField($value, 'string', 2)))
			throw new \Exception("U dient een wachtwoord in te vullen van tenminste 2 tekens.", 1);

		// Dont ever save unhashed passwords, so lets hash it in a safe manner
		$this->_pass = password_hash($value, PASSWORD_BCRYPT, ['cost' => 10 ]);
	}

	/**
	 * Method to set the tel of this user
	 * @param Integer $value The tel
	 */
	public function setTel($value) {
		if(false === ($value = $this->checkField($value, 'float', 10)))
			throw new \Exception("U dient een geldig telefoonnummer op te geven van minstens 10 cijfers.");
		$this->_tel = $value;
	}

	/**
	 * Method to add an address to this user
	 * @param Address $value The address object to be added
	 */
	public function addAddress($value) {
		$this->_address[$value->getID()] = $value;
	}


	/**
	 * Method to construct a new user
	 * @param Integer $id The ID of the user to be loaded
	 */
	public function __construct($id = null) {
		parent::__construct();
		if($id != null) $this->load($id);
	}

	/**
	 * Method to load the values of this product from the database
	 * @return Boolean True: if the user is loaded, False: otherwise
	 */
	public function load($id = null) {
		if($id != null) 
			$this->_id = $id;

		if($this->_id == null)
			throw new \Exception("Can not load a user by ID witouth a valid ID");

		// Load from the database
		return $this->_load("SELECT * FROM user WHERE usr_id = :id;", array(':id' => $this->_id));
	}

	/**
	 * Method to load a user by a mail address
	 * @param  String  $mail The mail address
	 * @return Boolean True: if the user is loaded, False: otherwise
	 */
	public function loadByMail($mail = null) {
		if($mail != null)
			$this->_mail = $mail;

		if($this->_mail == null)
			throw new \Exception("Can not load a user by mail witouth a valid Mail");

		return $this->_load("SELECT * FROM user WHERE usr_mail = :mail;", array(':mail' => $this->_mail));
	}

	/**
	 * Method to load the user by a certain query with params
	 * @param  String  $sql    The query
	 * @param  Array   $params The array of params
	 * @return Boolean True: if user is loaded, False: otherwise
	 */
	private function _load($sql, $params) {
		if(false !== ($user = $this->_db->select($sql, $params))) {
			$this->_id			= $user['usr_id'];
			$this->_mail		= $user['usr_mail'];
			$this->_pass		= $user['usr_pass'];
			$this->_tel			= $user['usr_tel'];
			$this->_lastlogin	= $user['usr_lastlogin'];
			$this->_isAdmin		= (ord($user['usr_admin']) == 1) ? true : false;

			$this->_address = array();
			if(false !== ($addresses = $this->_db->select("SELECT * FROM address WHERE adr_usr_id = :id;", array(':id' => $this->_id), true))) {
				foreach ($addresses as $key => $address) {
					$adr = new Address($address["adr_id"]);
					$this->_address[$adr->getID()] = $adr;
				}
			}

			
			return true;
		}
		return false;
	}

	/**
	 * Method to check if a certain email matches a certain password in the database
	 * @param  String $mail The email to check against
	 * @param  String $pass The unencrypted password
	 * @return Boolean      True: if match is success, False: if otherwise
	 */
	public function checkMailPasswordMatch($mail, $pass) {
		if(false !== ($user = $this->_db->select("SELECT usr_pass FROM user WHERE usr_mail = :mail;", array(':mail' => $mail)))) {
			if(count($user) == 1) {
				// Use PHP its password verify function to check if the stored database hash matches the password
				if (password_verify($pass, $user['usr_pass'])) {
					return true;
				}
			}
		}

		// Always return false if not true is returned yet :)
		return false;
	}


	/**
	 * Method to save the values of this user to the database
	 */
	public function save() {
		// Insert, but when already in the database, update
		$isInserted = ($this->_id == null) ? true : false;
		$response = $this->_db->command('INSERT INTO `user` (
			`usr_id`,
			`usr_mail`,
			`usr_pass`,
			`usr_tel`
		) VALUES (
			:id,
			:mail,
			:pass,
			:tel
		) ON DUPLICATE KEY UPDATE
			`usr_mail` = VALUES(usr_mail),
			`usr_pass` = VALUES(usr_pass),
			`usr_tel` = VALUES(usr_tel)
		;', array(
			':id'	=> $this->_id,
			':mail'	=> $this->_mail,
			':pass'	=> $this->_pass,
			':tel'	=> $this->_tel
		), true);

		if($isInserted) $this->_id = $response['lastInsertId'];

		// Save addresses too
		foreach ($this->_address as $key => $adr) {
			$adr->setUser($this->_id);
			$adr->save();
		}

		// Return if save is successful!
		return ($response != false);
	}

}