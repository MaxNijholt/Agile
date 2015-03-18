<?php
/**
 * @author Max Nijholt <Max@Nijholt.net>
 */

namespace model;
use core;

class DashboardItem extends core\Model {
	/* Privates */
	private $_id 	= null;
	private $_icon 	= null;
	private $_text	= null;
	private $_panel	= null;
	private $_link	= null;

	/**
	 * Method to get the ID of this dashboard item.
	 * @return Integer ID of this item.
	 */
	public function getID(){
		return $this->_id;
	}

	/**
	 * Method to get the CSS Class for the icon.
	 * @return CSS class for the icon
	 */
	public function getIcon(){
		return $this->_icon;
	}

	/**
	 * Method to get the Text description for the button.
	 * @return String The text corresponding to this panel.
	 */
	public function getText(){
		return $this->_text;
	}

	/**
	 * Method to get pannel class.
	 * @return CSS class Contains the class used for the panel.
	 */
	public function getPanel(){
		return $this->_panel;
	}

	/**
	 * Method to get pannel class.
	 * @return CSS class Contains the class used for the panel.
	 */
	public function getLink(){
		return $this->_link;
	}

	/**
	 * Constructor
	 * @param ID $id
	 */
	public function __construct($id = null){
		parent::__construct();
		if($id != null) $this->load($id);
	}

	public function load($id = null) {
		if($id != null) 
			$this->_id = $id;

		if($this->_id == null)
			throw new \Exception("Can not load Dashboard-Items by ID witouth a valid ID");

		// Load from the database
		return $this->_load("SELECT * FROM DashboardItems WHERE usr_id = :id;", array(':id' => $this->_id));
	}

		/**
	 * Method to set the ID of this dashboard item.
	 * @return Integer ID of this item.
	 */
	public function setID($newID){
		 $_id = $newID;
	}

	/**
	 * Method to set the CSS Class for the icon.
	 * @return CSS class for the icon
	 */
	public function setIcon($newIcon){
		$_icon = $newIcon;
	}

	/**
	 * Method to set the Text description for the button.
	 * @return String The text corresponding to this panel.
	 */
	public function setText($newText){
		$_text = $newText;
	}

	/**
	 * Method to set pannel class.
	 * @return CSS class Contains the class used for the panel.
	 */
	public function setPanel($newPanel){
		$_panel = $newPanel;
	}

	/**
	 * Method to set pannel class.
	 * @return CSS class Contains the class used for the panel.
	 */
	public function setLink($newLink){
		$_link = $newLink;
	}

}