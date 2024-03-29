<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core;

class Adminbeheer extends core\Controller {
	public function index($action = 'list', $start = 0) {
		/*
		Sectie voor het weergeven van de verschillende pagina's met postcodes
		 */
		if ($action === 'list') {
			$this->load->view('Adminbeheer', array(
			"resultset" => $this->getPostalCodes($start * 20),
			"next" => $start + 1,
			"message" => ''
			));
		}

		/*
		Sectie voor de verwijder functionaliteit in postcode beheer
		 */
		if ($action === 'delete') {
			$this->load->view('confirmPostalcodeDeletion', array(
			"postcodedelete" => $_POST['postcode'],
			"huisnummerdelete" => $_POST['huisnummer']
			));
		}

		if ($action === 'confirmed') {
			if ($this->removePostalCode($_POST['confirmedPostcode'], $_POST['confirmedHuisnummer']) === 'success') {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Het adres is succesvol verwijdert.'
				));
			}
			else {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Er is iets fout gegaan tijdens het verwijderen.'
				));
			}
		}	

		/*
		Sectie voor het aanpassen van een postcode entry in de database
		 */
		
		if ($action === 'edit') {
			$this->load->view('EditPostalCode', array(
			"postcodeedit" => $_POST['postcode'],
			"huisnummeredit" => $_POST['huisnummer']
			));
		}

		if ($action === 'editconfirmed') {
			if ($this->editPostalCode($_POST['desiredPostcode'], $_POST['desiredHuisnummer']) === 'editsuccess') {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Het adres is succesvol aangepast.'
				));
			}
			else {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Er is iets fout gegaan tijdens het aanpassen.'
				));
			}
		}

		/*
		Sectie voor het aanmaken van een nieuw postcode entry in de database
		 */
		
		if ($action === 'create') {
			$this->load->view('NewAdminAccount');
		}
		if ($action === 'created') {
			$creationStatus = $this->createPostalCode($_POST['creatingPostcode'], $_POST['creatingHuisnummer']);
			if ( $creationStatus === 'createsuccess') {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Het adres is succesvol aangemaakt.'
				));
			}
			if ($creationStatus === 'createerror') {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Er is iets fout gegaan tijdens het aanmaken.'
				));
			}
			if ($creationStatus === 'existingerror') {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Het adres dat je wilt aanmaken bestaat al.'
				));
			}
		}
	}

	private function getPostalCodes($start) {
		$query = "SELECT voornaam, achternaam, email FROM admin ORDER BY voornaam, achternaam ASC LIMIT :start, 20;";
		$postalCodes = $this->_db->select($query,array(
			':start' => $start
			),true);
		return $postalCodes;
		//echo "<pre>";
		//print_r($postalCodes);
	}

	private function removePostalCode() {
		$query = "DELETE FROM `postcode-check` WHERE postcode = '" . $_POST['confirmedPostcode'] . "' AND huisnummer = '" . $_POST['confirmedHuisnummer'] . "';";
		try {
			$this->_db->command($query);
			return 'success';
		} catch (Exception $e) {
			return 'error';
		}
	}

	private function editPostalCode() {
		$query = "
			UPDATE `postcode-check` 
			SET postcode='" . $_POST['desiredPostcode'] . "', huisnummer='" . $_POST['desiredHuisnummer'] . "' 
			WHERE postcode='" . $_POST['originalPostcode'] . "' AND huisnummer='" . $_POST['originalHuisnummer'] . "';";
		
		try {
			$this->_db->command($query);
			return 'editsuccess';
		} catch (Exception $e) {
			return 'editerror';
		}
	}

	private function createPostalCode() {
		$query = "INSERT INTO `postcode-check` VALUES ('" . $_POST['creatingPostcode'] . "','" . $_POST['creatingHuisnummer'] . "');";
		$checkQuery = "SELECT * FROM `postcode-check` WHERE postcode='" . $_POST['creatingPostcode'] . "' AND huisnummer='" . $_POST['creatingHuisnummer'] . "';";
		
		$checkResult = $this->_db->select($checkQuery);

		if (is_null($checkResult['postcode'])) {
			try {
			$this->_db->command($query);
			return 'createsuccess';
			} catch (Exception $e) {
			return 'createerror';
			}
		}
		else {
			return 'existingerror';
		}
		
	}
}