<?php

namespace model;
use core;

class Deelwijk extends core\Model
{
	/**
	 * get deelwijk by id
	 * @param  [int] $id [id of deelwijk in database]
	 * @return [object]     [deelwijk entry from database]
	 */
	public function getDeelwijk($id)
	{
		$query = "SELECT * FROM deelwijk WHERE deelwijkId = $id";

		$deelwijk = $this->_db->select($query, array(), false);

		return $deelwijk;
	}

	/**
	 * get all deelwijken
	 * @return [array] [all deelwijk entries from database]
	 */
	public function getDeelwijken()
	{
		$query = "SELECT * FROM deelwijk";

		$deelwijken = $this->_db->select($query, array(), true);

		return $deelwijken;

	}

	/**
	 * create a new deelwijk
	 * @param  [String] $naam         [name of deelwijk]
	 * @param  [String] $beschrijving [description of deelwijk]
	 */
	public function createDeelwijk($naam, $beschrijving)
	{
		$query = "INSERT INTO deelwijk(deelwijkNaam, beschrijving) VALUES (?, ?)";

		$this->_db->command($query, array($naam, $beschrijving), true);
	}

	/**
	 * delete deelwijk by id
	 * @param  [int] $id [id of deelwijk in database]
	 */
	public function deleteDeelwijk($id)
	{
		$query = "DELETE FROM deelwijk WHERE deelwijkId = $id";

		$deelwijk = $this->_db->command($query, array(), false);
	}

	/**
	 * update existing deelwijk in database
	 * @param  [int] $id           [id of deelwijk in database]
	 * @param  [String] $naam         [name of deelwijk]
	 * @param  [String] $beschrijving [description of deelwijk]
	 */
	public function updateDeelwijk($id, $naam, $beschrijving)
	{
		$query = "UPDATE deelwijk SET deelwijkNaam = ?, beschrijving = ? WHERE deelwijkId = $id";
		$this->_db->command($query, array($naam, $beschrijving));
	}

}

?>