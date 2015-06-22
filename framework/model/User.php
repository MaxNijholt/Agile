<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 * @author Max Nijholt 	 max@nijholt.net
 */

namespace model;
use core;

/**
 * Specifies a certain product
 */
class User extends core\Model {

	/* Private variables */
	private $_id = null;
	private $_email = null;
	private $_wachtwoord = null;
	private $_postcode = null;
	private $_voornaam = null;
	private $_achternaam = null;
	private $_huisnummer = null;

	/**
	 * Method to get the id of this user
	 * @return Integer The ID
	 */
	public function getID() {
		return $this->_id;
	}

	/**
	 * Method to get the Firstname of the User
	 * @return String firstname
	 */
	public function getFirstname(){
		return $this->_voornaam;
	}

	/**
	 * Method to get the Lastname of the User
	 * @return String lastname
	 */	
	public function getLastname(){
		return $this->_achternaam;
	}

	/**
	 * Method to get the housenumber
	 * @return String housenumber
	 */
	public function getHouseNumber(){
		return $this->_huisnummer;
	}

	/**
	 * Method to get the mail of this user
	 * @return String The mail
	 */
	public function getEMail() {
		return $this->_email;
	}

	/**
	 * Method to get the Postcode
	 * @return String postcode
	 */
	public function getPostcode(){
		return $this->_postcode;
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
	public function setEMail($value) {
		if (!filter_var($value, FILTER_VALIDATE_EMAIL))
			throw new \Exception("U dient een geldig e-mail adres op te geven.");

		$this->_email = $value;
	}

	/**
	 * Method to set the pass for this user
	 */
	public function setPass($value) {
		if(false === ($value = $this->checkField($value, 'string', 8)))
			throw new \Exception("U dient een wachtwoord in te vullen van tenminste 8 tekens.", 1);

		// Dont ever save unhashed passwords, so lets hash it in a safe manner
		$this->_wachtwoord = password_hash($value, PASSWORD_BCRYPT, ['cost' => 10 ]);
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
		return $this->_load("SELECT * FROM users WHERE id = :id;", array(':id' => $this->_id));
	}

	/**
	 * Method to load a user by a mail address
	 * @param  String  $mail The mail address
	 * @return Boolean True: if the user is loaded, False: otherwise
	 */
	public function loadByMail($email = null) {
		if($email != null)
			$this->_email = $email;

		if($this->_email == null)
			throw new \Exception("Can not load a user by mail witouth a valid E-Mail");

		return $this->_load("SELECT * FROM users WHERE email = :email;", array(':email' => $this->_email));
	}

	/**
	 * Method to load the user by a certain query with params
	 * @param  String  $sql    The query
	 * @param  Array   $params The array of params
	 * @return Boolean True: if user is loaded, False: otherwise
	 */
	private function _load($sql, $params) {
		if(false !== ($user = $this->_db->select($sql, $params))) {
			$this->_id			= $user['id'];
			$this->_email		= $user['email'];
			$this->_wachtwoord	= $user['wachtwoord'];
			$this->_postcode	= $user['postcode'];
			$this->_voornaam	= $user['voornaam'];
			$this->_achternaam	= $user['achternaam'];
			$this->_huisnummer	= $user['huisnummer'];

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
	public function checkMailPasswordMatch($email, $pass) {
		if(false !== ($user = $this->_db->select("SELECT wachtwoord FROM users WHERE email = :email;", array(':email' => $email)))) {
			if(count($user) == 1) {
				// Use PHP its password verify function to check if the stored database hash matches the password
				if (password_verify($pass, $user['wachtwoord'])) {
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
		$response = $this->_db->command('INSERT INTO `users` (
			`id`,
			`email`,
			`wachtwoord`,
			`postcode`,
			`voornaam`,
			`achternaam`,
			`huisnummer`
		) VALUES (
			:id,
			:email,
			:wachtwoord,
			:postcode,
			:voornaam,
			:achternaam.
			:huisnummer
		) ON DUPLICATE KEY UPDATE
			`email` 		= VALUES(email),
			`wachtwoord` 	= VALUES(wachtwoord),
			`postcode` 		= VALUES(postcode),
			`voornaam` 		= VALUES(voornaam),
			`achternaam` 	= VALUES(achternaam),
			`huisnummer` 	= VALUES(huisnummer)
		;', array(
			':id'			=> $this->_id,
			':email'		=> $this->_email,
			':wachtwoord'	=> $this->_wachtwoord,
			':postcode'		=> $this->_postcode,
			':voornaam'		=> $this->_voornaam,
			':achternaam'	=> $this->_achternaam,
			':huisnummer'	=> $this->_huisnummer
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