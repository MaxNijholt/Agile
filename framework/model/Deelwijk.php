<?php

namespace model;
use core;

class Deelwijk extends core\Model
{

	public function getDeelwijk($id)
	{
		$query = "SELECT * FROM deelwijk WHERE deelwijkId = ?";

		$deelwijk = $this->_db->select($query, array($id), false);

		return $deelwijk;
	}

	public function getDeelwijken()
	{
		$query = "SELECT * FROM deelwijk";

		$deelwijken = $this->_db->select($query, array(), true);

	}

	public function createDeelwijk($naam, $beschrijving)
	{
		$query = "INSERT INTO deelwijk(deelwijkNaam, beschrijving) VALUES (?, ?)";

		$this->_db->command($query, array($naam, $beschrijving), true);
	}

	public function deleteDeelwijk($id)
	{
		$query = "DELETE FROM deelwijk WHERE deelwijkId = ?";

		$deelwijk = $this->_db->select($query, array($id), false);

		return $deelwijk;
	}

	public function updateDeelwijk()
	{

	}

}

?>