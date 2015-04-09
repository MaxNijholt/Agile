<?php

namespace model;
use core;

class Deelwijk extends core\Model
{

	public function getDeelwijk($id)
	{
		$query = "SELECT * FROM deelwijk WHERE deelwijkId = $id";

		$deelwijk = $this->_db->select($query, array(), false);

		return $deelwijk;
	}

	public function getDeelwijken()
	{
		$query = "SELECT * FROM deelwijk";

		$deelwijken = $this->_db->select($query, array(), true);

		return $deelwijken;

	}

	public function createDeelwijk($naam, $beschrijving)
	{
		$query = "INSERT INTO deelwijk(deelwijkNaam, beschrijving) VALUES (?, ?)";

		$this->_db->command($query, array($naam, $beschrijving), true);
	}

	public function deleteDeelwijk($id)
	{
		$query = "DELETE FROM deelwijk WHERE deelwijkId = $id";

		$deelwijk = $this->_db->command($query, array(), false);
	}

	public function updateDeelwijk($id, $naam, $beschrijving)
	{
		$query = "UPDATE deelwijk SET deelwijkNaam = ?, beschrijving = ? WHERE deelwijkId = $id";
		$this->_db->command($query, array($naam, $beschrijving));
	}

}

?>